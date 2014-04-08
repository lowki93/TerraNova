<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\Theme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousThemeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('theme', 'entity', array(
                'class' => 'TerraNovaBundle:Theme',
                'property' => 'name',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\SousTheme'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_soustheme';
    }
}
