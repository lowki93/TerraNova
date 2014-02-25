<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController as Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiController extends Controller
{

	/**
     * @Rest\View
     */
	public function getUserAction()
	{
	    $users = $this->getDoctrine()->getRepository('TerraNovaBundle:User')->findAll();
        return $this->handleView($this->view($users, 200));
	}

}
