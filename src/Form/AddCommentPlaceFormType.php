<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddCommentPlaceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commenttext', TextareaType::class,[
                                                    'label' => 'Escribe un nuevo Comentario',
                                                                 'attr' => 
                                                                 ['placeholder' => 'Escriba aqui su comentario']
                                                    ])
            //->add('place')
            ->add('Enviar', SubmitType::class,['attr' => ['class' =>'btn btn-success my-3 float-end']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
