<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController as Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\DateTime;

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

	public function teacherLoginAction(Request $request)
	{
		$date = date('Y-m-d');
		// if ('POST' === $request->getMethod()) {
		// 	die('test');

  //       }
		// $data = $request->request->all();
		// $email = $data['email'];
		// $password = $data['password'];
		$email = "budain.kevin@gmail.com";
		$password = "ZdVuTeMwg8xkrecCrVEtDY4iGKZmakpcNU63SSa5nW4v77Rm+GwKDQlKkZOkp+0TmI4Ui4pH48OVYEAMEFcFDw==";

		// // Pour récupérer le service UserManager du bundle
		$userManager = $this->get('fos_user.user_manager');

		// Pour charger un utilisateur
		$user = $userManager->findUserBy(array('email' => $email, 'password' => $password));

		$seance =count($user->getSeance());

		for ($i=0; $i < $seance; $i++) {
			$dateSeance = date_format($user->getSeance()[$i]->getDate(), 'Y-m-d');
			if($dateSeance !== $date) {
				unset($user->getSeance()[$i]);
			}
		}
	    return $this->handleView($this->view($user, 200));
	}

	public function studentLoginAction()
	{	
		$enseignantId = "5";
		$classeId = "1";
		$login = "Louise";

		$em = $this->getDoctrine();

		$class = $em->getRepository('TerraNovaBundle:Classe')->findById($classeId);
		$student = $em->getRepository('TerraNovaBundle:Student')->findByStudent($login,$class);

	    return $this->handleView($this->view($student, 200));
	}
}
