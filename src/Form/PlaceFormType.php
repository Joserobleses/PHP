<?php

namespace App\Form;

use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//use App\Form\PlaceFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\File;



class PlaceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('descriptionplace',TextType::class,['label' => 'Descripció'])
            ->add('foto', FileType::class,[
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
            ->add('pais',TextType::class)
            ->add('poblacio',TextType::class)
            ->add('tipus',TextType::class)
            ->add('valoracio')
            ->add('guardar', SubmitType::class,['attr' => ['class' =>'btn btn-success my-3']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Place::class,
            'csfr_protection' => true,
            'csfr_field_name' => '_token',
            'csfr_token_id' => 'jose',
        ]);
    }
}
