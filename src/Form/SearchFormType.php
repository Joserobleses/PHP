<?php

namespace App\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Service\SimpleSearchService;

class SearchFormType extends AbstractType{
   
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('campo', ChoiceType::class,['choices' => $options['field_choices']])
        ->add('valor', TextType::class)
        ->add('orden',ChoiceType::class,['choices' => $options['order_choices']])
        ->add('sentido', ChoiceType::class,[
            'expanded' => true,
            'multiple' => false,
            'choices' => [
                'Asc' => 'ASC',
                'Desc' => 'DESC'
            ],
            'choice_attr' => [
                'Asc' => ['checked' => 'checked'],  
            ],
        ])
        ->add('limite', NumberType::class, [
            'required' => true,
            'html5' => true,
            'attr' => ['min' => 1, 'max'=>25],
        
        ])
        ->add('buscar', SubmitType::class,[
            'attr' => ['class' => 'btn btn-primary my-3']
        
        ]);
        
    }
    public function configureOptions(OptionsResolver $resolver){
        
        $resolver->setDefaults([
            'data_class' => SimpleSearchService::class,
            'field_choices' => ['id' => 'id'],
            'order_choices' => ['id' => 'id'],
            
        ]);
    }
}