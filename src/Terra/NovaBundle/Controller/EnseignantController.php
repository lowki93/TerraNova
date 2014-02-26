<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnseignantController extends Controller
{

	public function indexAction()
	{
	    return $this->render('TerraNovaBundle:Enseignant:index.html.twig', array());
	}

}