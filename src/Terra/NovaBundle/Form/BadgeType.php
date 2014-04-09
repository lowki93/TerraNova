<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\sousTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BadgeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('sousTheme', 'entity', array(
                'class' => 'TerraNovaBundle:sousTheme',
                'property' => 'name',
            ))
            ->add('file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\Badge'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_badge';
    }
}
