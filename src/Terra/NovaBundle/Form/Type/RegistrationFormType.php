<?php

namespace Terra\NovaBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('lastName', null, array('label' => 'form.lastname', 'translation_domain' => 'FOSUserBundle' ))
            ->add('name', null, array('label' => 'form.name', 'translation_domain' => 'FOSUserBundle' ))
            ;
    }

    public function getName()
    {
        return 'terra_nova_registration';
    }
}
