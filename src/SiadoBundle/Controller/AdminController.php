<?php

namespace SiadoBundle\Controller;

use SiadoBundle\Entity\Article;
use SiadoBundle\Form\ArticleAddType;
use SiadoBundle\Form\ArticleEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /* Articles */

    public function articlesListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $articles = $rep->getArticlesByDate('DESC');

        return $this->render('SiadoBundle:Admin/articles:articles-liste.html.twig', array(
            'articles' => $articles
        ));
    }

    public function articleShowAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $article = $rep->find($id);

        if(null === $article)
            $this->redirectToRoute('admin');

        return $this->render('@Siado/Admin/articles/article-show.html.twig', array(
            'article' => $article
        ));
    }

    public function articleAddAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleAddType::class, $article,
            array(
                'action' => $this->generateUrl('admin_article_add'),
                'method' => 'POST'
            )
        );

        $all_images = $this->getDoctrine()->getManager()->getRepository('SiadoBundle:Image')->findAll();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $file = $article->getImage()->getFile();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('articles_directory'),
                $fileName
            );

            $article->getImage()->setFile($fileName);
            $article->setDate(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('@Siado/Admin/articles/article-add.html.twig', array(
            'form' => $form->createView(),
            'images' => $all_images
        ));
    }

    public function articleEditAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('SiadoBundle:Article')->find($id);

        if(null === $article)
            $this->redirectToRoute('admin');

        $current_image = $article->getImage()->getFile();

        $form = $this->createForm(ArticleEditType::class, $article,
            array(
                'action' => $this->generateUrl('admin_article_edit', array('id' => $article->getId())),
                'method' => 'POST'
            )
        );

        $all_images = $this->getDoctrine()->getManager()->getRepository('SiadoBundle:Image')->findAll();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('@Siado/Admin/articles/article-edit.html.twig', array(
            'form' => $form->createView(),
            'images' => $all_images,
            'current_image' => $current_image
        ));
    }

    public function articleRemoveAction(Request $request)
    {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('SiadoBundle:Article')->find($id);

        $dir = $this->getParameter("articles_directory");

        if(null === $article){
            $response = new Response(
                "Erreur lors de la suppression de l'article !",
                Response::HTTP_NOT_FOUND,
                array('content-type' => 'text/plain')
            );

            return $response;
        }

        if(file_exists($dir . $article->getImage()->getFile()))
            unlink($dir . $article->getImage()->getFile());

        $em->remove($article);
        $em->flush();

        $response = new Response(
            "Suppression de l'article réussie !",
            Response::HTTP_OK,
            array('content-type' => 'text/plain')
        );

        return $response;
    }


    /* Messages */

    public function messagesMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Message');
        $messages = $rep->getRecentMessages();

        return $this->render('SiadoBundle:Admin/messages:messages-menu.html.twig', array(
            'messages' => $messages
        ));
    }

    public function messagesListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Message');
        $messages = $rep->getMessagesByDate('DESC');

        return $this->render('SiadoBundle:Admin/messages:messages-liste.html.twig', array(
            'messages' => $messages
        ));
    }

    public function messageShowAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Message');
        $message = $rep->find($id);

        if(null === $message)
            $this->redirectToRoute('admin_message_liste');

        $message->setStatus(1);
        $em->persist($message);
        $em->flush();

        return $this->render('@Siado/Admin/messages/message-show.html.twig', array(
            'message' => $message
        ));
    }

    public function messageRemoveAction(Request $request)
    {
        $id = $request->get("id");

        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('SiadoBundle:Message')->find($id);

        if(null === $message){
            $response = new Response(
                'Erreur lors de la suppression du message !',
                Response::HTTP_NOT_FOUND,
                array('content-type' => 'text/plain')
            );

            return $response;
        }

        $em->remove($message);
        $em->flush();

        $response = new Response(
            'Suppression du message réussie !',
            Response::HTTP_OK,
            array('content-type' => 'text/plain')
        );

        return $response;
    }
}
