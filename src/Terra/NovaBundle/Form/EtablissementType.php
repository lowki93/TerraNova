<?php

namespace Terra\NovaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroNational')
            ->add('name')
            ->add('type', 'choice', array('choices' => array('College' => 'College', 'Primaire' => 'Primaire')))
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('active','hidden', array(
                'data' => "0"
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\Etablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_etablissement';
    }
}
