<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\User;
use Terra\NovaBundle\Entity\Classe;
use Terra\NovaBundle\Entity\Theme;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SeanceType extends AbstractType
{
    private $user;

    public function __construct( User $user)
    {

        $this->user = $user;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'date', array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date'),
              ))
            ->add('heure', 'time', array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'attr' => array('class' => 'time'),
              ))
            ->add('intro','textarea',array('attr' => array('rows' => '5','cols' => '15')))
            ->add('test', 'choice', array('choices' => array('1' => 'Oui', '0' => 'Non')))
            ->add('classe', 'entity', array(
                'class' => 'TerraNovaBundle:Classe',
                'property' => 'name',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('c')
                              ->orderBy('c.name', 'ASC')
                              ->where('c.enseignant = :user')
                              ->setParameter('user', $this->user);
                }
            ))
            ->add('theme', 'entity', array(
                'class' => 'TerraNovaBundle:Theme',
                'property' => 'name',
            ))
            ->add('enseignant', 'entity', array(
                'class' => 'TerraNovaBundle:User',
                'property' => 'name',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                              ->where('u.id = :id')
                              ->setParameter('id', $this->user->getId());
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
            'data_class' => 'Terra\NovaBundle\Entity\Seance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'terra_novabundle_seance';
    }
}
