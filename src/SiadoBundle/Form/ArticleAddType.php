<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 11/10/2017
 * Time: 18:46
 */

namespace SiadoBundle\Form;
use SiadoBundle\Entity\Article;
use SiadoBundle\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', ImageType::class,
                array(
                    'required' => true,
                    'data_class' => Image::class
                )
            )
            ->add('ajouter', SubmitType::class, array('label' => 'Ajouter'));
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