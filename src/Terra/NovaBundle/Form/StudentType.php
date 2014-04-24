<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\Classe;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{

    private $idClasse;

    public function __construct( $idClasse )
    {
        $this->idClasse = $idClasse;
    }

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
            ->add('login')
            ->add('avatar','hidden', array(
                'data' => "000"
            ))
            ->add('classe', 'entity', array(
                'class' => 'TerraNovaBundle:Classe',
                'property' => 'name',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                              ->orderBy('c.name', 'ASC')
                              ->where('c.id = :id')
                              ->setParameter('id', $this->idClasse);
                }
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
