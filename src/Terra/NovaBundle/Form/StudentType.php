<?php

namespace Terra\NovaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('age')
            ->add('avatar')
            ->add('classe', 'entity', array(
                'class' => 'TerraNovaBundle:Classe',
                'property' => 'name'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_student';
    }
}
