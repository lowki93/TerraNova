<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EnseignantController extends Controller
{

	public function indexAction()
	{
		// test for user is conected
		$user = $this->container->get('security.context')->getToken()->getUser();
		$idEnseignant = $user->getId();
		$classe = $this->getDoctrine()->getRepository('TerraNovaBundle:Classe')->findByEnseignant($idEnseignant);
		return $this->render('TerraNovaBundle:Enseignant:index.html.twig', array( 'user' => $user,
	'classe' => $classe,));
	}

}
