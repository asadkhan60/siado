<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 24/10/2017
 * Time: 19:16
 */

namespace SiadoBundle\Form;

use SiadoBundle\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class,
            array(
                'required' => true,
                'mapped' => true,
                'attr' => array(
                    'placeholder' => "Nom *"
                )
            )
        )->add('email', EmailType::class,
            array(
                'required' => true,
                'mapped' => true,
                'attr' => array(
                    'placeholder' => "Email *"
                )
            )
        )->add('telephone', TextType::class,
            array(
                'required' => true,
                'mapped' => true,
                'attr' => array(
                    'placeholder' => "Téléphone *"
                )
            )
        )->add('objet', ChoiceType::class,
            array(
                'required' => true,
                'mapped' => true,
                'choices'  => array(
                    'Selectionnez un service' => null,
                    'Siado Ménage' => "Siado Ménage",
                    'Siado Garde Enfants' => "Siado Garde Enfants",
                    'Siado Aides Mobilité' => "Siado Aides Mobilité",
                    'Siado Bricolage / Jardinage' => "Siado Bricolage / Jardinage",
                    'Siado Soutien Scolaire' => "Siado Soutien Scolaire"
                ),
            )
        )->add('message', TextareaType::class,
            array(
                'required' => true,
                'mapped' => true,
                'attr' => array(
                    'placeholder' => "Message *"
                )
            )
        )->add('envoyer', SubmitType::class, array('label' => 'Envoyer'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class
        ));
    }
}