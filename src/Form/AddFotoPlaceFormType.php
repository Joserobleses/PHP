<?php

namespace App\Form;

use App\Entity\Photo;
use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\File;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class AddFotoPlaceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo')
            ->add('fecha')
            ->add('fichero', FileType::class,[
                'required'      => false,
                'data_class'    => NULL,
                'constraints'   => [
                    new File([
                        'maxSize'   =>'10240k',
                        'mimeTypes' => ['image/jpeg','image/png','image/gif',],
                        'mimeTypesMessage' => 'Debes subir una imagen png, jpg, o gif',
                    ])
                ],
            ])
            ->add('descripcion')
            ->add('Anadir', SubmitType::class,['attr' => ['class' =>'btn btn-success my-3']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
