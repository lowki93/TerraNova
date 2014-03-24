<?php

namespace Terra\NovaBundle\Form;

use Terra\NovaBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

class ClasseType extends AbstractType
{
    private $user;
    public $etablissementType;

    public function __construct( User $user)
    {
         $this->user = $user;
         $this->etablissementType = $user->getEtablissement()->getType();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name');

        switch($this->etablissementType){
            case 'Primaire':
                $builder
                    ->add('niveau', 'choice',
                        array('choices' => array(
                            'CP' => 'CP',
                            'CP/CE1' => 'CP/CE1',
                            'CE1' => 'CE1',
                            'CE1/CE2' => 'CE1/CE2',
                            'CE2' => 'CE2',
                            'CE2/CM1' => 'CE2/CM1',
                            'CM1' => 'CM1',
                            'CM1/CM2' => 'CM1/CM2',
                            'CM2' => 'CM2'))
                        );
                    break;
            case 'College':
                $builder
                    ->add('niveau', 'choice',
                        array('choices' => array(
                            '6e' => '6e',
                            '5e' => '5e',
                            '4e' => '4e',
                            '3e' => '3e'))
                        );
                    break;
        }
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
