<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('texte', TextareaType::class, array(
                'required' => true
            ))
            ->add('selected', ChoiceType::class, array(
                'choices'  => array(        
                    'Oui' => true,
                    'Non' => false,
                ),
                'choices_as_values' => true,
                'choice_value' => function ($currentChoiceKey) {
                    return $currentChoiceKey ? 'true' : 'false';
                },
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Content'
        ));
    }
}
