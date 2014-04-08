<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function userAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
        $users = $em->getRepository('TerraNovaBundle:User')->findAll();

        return $this->render('TerraNovaBundle:Admin:index.html.twig', array(
            'users' => $users,
        ));
    }

    public function allEtablissementAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('TerraNovaBundle:Etablissement')->findAll();

        return $this->render('TerraNovaBundle:Etablissement:index.html.twig', array(
            'entities' => $entities,
            'active' => $active = false,
        ));
    }

    public function NoActiveEtablissementAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('TerraNovaBundle:Etablissement')->findByActive(false);

        return $this->render('TerraNovaBundle:Etablissement:index.html.twig', array(
            'entities' => $entities,
            'active' => $active = true,
        ));
    }
}