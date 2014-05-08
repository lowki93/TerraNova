<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\SousTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TrophyType extends AbstractType
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
                'class' => 'TerraNovaBundle:SousTheme',
                'property' => 'name',
            ))
            ->add('file')
            ->add('type', 'choice', array('choices' => array('or' => 'Or', 'argent' => 'Argent', 'bronze' => 'Bronze', 'aucun' => 'Aucun')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\Trophy'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_trophy';
    }
}
