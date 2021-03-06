<?php
/**
 * Created by PhpStorm.
 * User: khanf
 * Date: 10/10/2017
 * Time: 16:55
 */

namespace SiadoBundle\Form;

use SiadoBundle\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class,
                    array(
                        'label' => 'Image :',
                        'data_class' => null
                    ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Image::class,
        ));
    }
}