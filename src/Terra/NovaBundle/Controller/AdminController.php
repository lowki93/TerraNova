<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function userAction()
    {
    	$em = $this->getDoctrine()->getManager();

        // $entities = $em->getRepository('TerraNovaBundle:User')->findByRole;

        // return $this->render('TerraNovaBundle:Classe:index.html.twig', array(
        //     'entities' => $entities,
        // ));
        return $this->render('TerraNovaBundle:Admin:index.html.twig');
    }
}