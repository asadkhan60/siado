<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 11/10/2017
 * Time: 18:46
 */

namespace SiadoBundle\Form;
use Symfony\Component\DependencyInjection\ContainerInterface;
use SiadoBundle\Entity\Article;
use SiadoBundle\Entity\Image;
use SiadoBundle\Form\DataTransformer\FileTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ArticleEditType extends AbstractType
{
    private $transformer;
    private $container;
    private $file;

    public function __construct(FileTransformer $transformer, ContainerInterface $container)
    {
        $this->transformer = $transformer;
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', ImageType::class,
                    array(
                        'required' => false,
                        'data_class' => Image::class
                    )
                )
            ->add('editer', SubmitType::class, array('label' => 'Editer'));

        //$builder->addModelTransformer($this->transformer);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $this->file = $event->getData()->getImage()->getFile();
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $f = $event->getData()->getImage()->getFile();
            $dir = $this->container->getParameter('articles_directory');
            if($this->file !== $f){
                $fileName = md5(uniqid()).'.'.$f->guessExtension();
                $f->move(
                    $dir,
                    $fileName
                );

                if(file_exists($dir . $this->file))
                    unlink($dir . $this->file);

                $event->getData()->getImage()->setFile($fileName);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
            'validation_groups' => true
        ));
    }

    public function getParent()
    {
        return ArticleType::class;
    }
}