<?php

namespace SiadoBundle\Controller;

use SiadoBundle\Entity\Message;
use SiadoBundle\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $articles = $rep->getSomeArticlesByDate('DESC', 4);

        return $this->render('@Siado/Accueil/accueil.html.twig', array(
            'articles' => $articles
        ));
    }


    public function menageAction()
    {
        return $this->render('@Siado/Accueil/menage.html.twig');
    }

    public function gardeEnfantsAction()
    {
        return $this->render('@Siado/Accueil/garde-enfants.html.twig');
    }

    public function aideMobiliteAction()
    {
        return $this->render('@Siado/Accueil/aides-mobilite.html.twig');
    }

    public function bricolageJardinageAction()
    {
        return $this->render('@Siado/Accueil/bricolage-jardinage.html.twig');
    }

    public function aideDevoirsAction()
    {
        return $this->render('@Siado/Accueil/aides-devoirs.html.twig');
    }

    public function articleDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $article = $rep->find($id);

        if(null == $article)
            return $this->redirectToRoute('siado_accueil');

        $res_prev = $rep->getPreviousArticle($id);
        $res_next = $rep->getNextArticle($id);

        $article_prev = null;
        $article_next = null;

        if(count($res_prev) > 0) {
            if($res_prev[1] !== null)
                $article_prev = $rep->find($res_prev[1]);
        }

        if(count($res_next) > 0) {
            if($res_next[1] !== null)
                $article_next = $rep->find($res_next[1]);
        }

        return $this->render('@Siado/Accueil/article-detail.html.twig', array(
            'article' => $article,
            'article_prev' => $article_prev,
            'article_next' => $article_next
        ));
    }

    public function articleListeDetailAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $articles = $rep->getAllArticleByDate('DESC');

        if(count($articles) === 0)
            return $this->redirectToRoute('siado_accueil');

        return $this->render('@Siado/Accueil/article-liste-detail.html.twig', array(
            'articles' => $articles
        ));
    }

    /*public function articleListeDetailAction(Request $request)
    {
        $first = $request->get('first');
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('SiadoBundle:Article');
        $max = count($rep->findAll());

        $number = $this->getParameter('number_articles_page');

        if($first*$number < 0 || $first*$number > $max)
            return $this->redirectToRoute('siado_accueil');

        $articles = $rep->getArticlesListe($first*$number);

        return $this->render('@Siado/Accueil/article-liste-detail.html.twig', array(
            'articles' => $articles,
            'first' => $first,
            'max' => $max
        ));
    }*/

    public function contactFormAction(Request $request, \Swift_Mailer $mailer){
        $em =$this->getDoctrine()->getManager();

        $message = new Message();
        $form = $this->createForm(MessageType::class, $message,
            array(
                'action' => $this->generateUrl('siado_contact_form'),
                'method' => 'POST'
            )
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $message->setStatus(0);
            $message->setDateMessage(new \DateTime('now'));

            /*$msg = (new \Swift_Message($message->getObjet()))
                ->setFrom($message->getEmail())
                ->setTo('asad60khan@gmail.com')
                ->setBody(
                    $this->renderView(
                        '@Siado/Accueil/contact-form-email.html.twig',
                        array('message' => $message->getMessage())
                    ),
                    'text/html'
                );

            $mailer->send($msg);*/

            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('siado_accueil');
        }

        return $this->render('@Siado/Accueil/contact-form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}
