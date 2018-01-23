<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 10/10/2017
 * Time: 14:06
 */

namespace SiadoBundle\Form;

use SiadoBundle\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class,
                array(
                    'label' => 'Titre :',
                    'required' => true,
                    'mapped' => true
                ))
            ->add('description', TextareaType::class,
                array(
                    'label' => 'Description :',
                    'required' => true,
                    'mapped' => true
                ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
            'validation_groups' => true
        ));
    }
}