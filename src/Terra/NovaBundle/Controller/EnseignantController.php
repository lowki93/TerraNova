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
		if (!is_object($user) ) {
			$url = $this->container->get('router')->generate('terra_nova_enseigant_connection');
			return $response = new RedirectResponse($url);
		} else {
			$idEnseignant = $user->getId();
			$classe = $this->getDoctrine()->getRepository('TerraNovaBundle:Classe')->findByEnseignant($idEnseignant);
			return $this->render('TerraNovaBundle:Enseignant:index.html.twig', array( 'user' => $user,
																					   'classe' => $classe));
		}
	}

}