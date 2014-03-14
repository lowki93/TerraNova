<?php

namespace Terra\NovaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

class ClasseType extends AbstractType
{
    // private $securityContext;
 
    // public function __construct(SecurityContext $securityContext)
    // {
    //     $this->securityContext = $securityContext;
    // }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('niveau')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terra\NovaBundle\Entity\Classe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_classe';
    }
}
