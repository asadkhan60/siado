<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 11/10/2017
 * Time: 16:44
 */

namespace SiadoBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use SiadoBundle\Entity\Article;
use SiadoBundle\Entity\Image;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\HttpFoundation\File\File;

class FileTransformer implements DataTransformerInterface
{
    private $em;
    private $container;

    private $article_directory;
    private $image;

    public function __construct(EntityManagerInterface $em, ContainerInterface $container)
    {
        $this->em = $em;
        $this->container = $container;

        $this->article_directory = $this->container->getParameter('articles_directory');
    }

    /**
     *
     * @param  Article $article
     * @return Article|null
    */
    public function transform($article)
    {

    }

    /**
     *
     * @param  Article $article
     * @return Article|null
     * @throws TransformationFailedException if object (image) is not found.
     */
    public function reverseTransform($article)
    {

    }
}