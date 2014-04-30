<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController as Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
// use Symfony\Component\Validator\Constraints\DateTime;
use Terra\NovaBundle\Entity\ResultSubTheme;
use \DateTime;

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
			$classId = $user->getSeance()[$i]->getClasse()->getId();

			if($dateSeance !== $date || $classId !== $user->getCurrentClass()->getId()) {
				unset($user->getSeance()[$i]);
			}
		}
		//return new JsonResponse($user)
	    return $this->handleView($this->view($user, 200));
	}

	public function studentLoginAction(Request $request)
	{	
		// $data = $request->request->all();
		// $enseignantId = $data['enseignant_id'];
		// $classeId = $data['class_id'];
		// $login = $data['login'];
		$enseignantId = "5";
		$classeId = "2";
		$login = "Jordan";

		$em = $this->getDoctrine();

		$class = $em->getRepository('TerraNovaBundle:Classe')->findById($classeId);
		$student = $em->getRepository('TerraNovaBundle:Student')->findByStudent($login,$class);

		//return new JsonResponse($student)
	    return $this->handleView($this->view($student, 200));
	}

	public function updateAvatarAction(Request $request)
	{	
		// $data = $request->request->all();
		// $studentId = $data['student_id'];
		// $avatar = $data['avatar'];
		$studentId = "1";
		$avatar = "55844844";

		$em = $this->getDoctrine();
	    $student = $em->getRepository('TerraNovaBundle:Student')->unSetAvatar($studentId,$avatar);

	    if($student == 1)
			$response['good'] = true;	
	    else
			$response['good'] = false;

	    // return new JsonResponse($response);
	    return $this->handleView($this->view($response, 200));
	}

	public function resultSubThemeAction(Request $request)
	{
		// $data = $request->request->all();
		// $seanceId = $data['seance_id'];
		// $studentId = $data['student_id'];
		// $cozeText = $data['cozeText'];
		// $dragCozeText = $data['dragCozeText'];
		// $trueFalse = $data['trueFalse'];
		// $freeSentence = $data['freeSentence'];
		// $success = $data['success'];
		// $raTime = $data['raTime'];
		// $gameTime = $data['gameTime'];
		// $levelSuccess = $data['levelSuccess'];
		// $subThemeId = $data['subThemeId'];

		$seanceId = 1;
		$studentId = 2;
		$cozeText = "true,false,true,false,true,false,true,false";
		$dragCozeText = "false,true,false,true,false,true,false,true";
		$trueFalse = "false,false,false,false,false,true,false,true";
		$freeSentence = "je suis Glenn Sonna";
		$success = 100;
		$raTime = new DateTime('0000-00-00 0:20');
		$gameTime = new DateTime('0000-00-00 0:10');
		$levelSuccess = "or";
		$subThemeId = 2;

		$timePassing = new DateTime('0000-00-00 00:00');
		$timePassing->add($raTime);
		$timePassing->add($gameTime);

		$resultSubTheme = new ResultSubTheme();

		$em = $this->getDoctrine()->getManager();

		$seance = $em->getRepository('TerraNovaBundle:Seance')->find($seanceId);
		$student = $em->getRepository('TerraNovaBundle:Student')->find($studentId);
		$subTheme = $em->getRepository('TerraNovaBundle:SousTheme')->find($subThemeId);

		$resultSubTheme->setSeance($seance);	
		$resultSubTheme->setStudent($student);
		$resultSubTheme->setCozeText($cozeText);
		$resultSubTheme->setDragCozeText($dragCozeText);
		$resultSubTheme->setTrueFalse($trueFalse);
		$resultSubTheme->setFreeSentence($freeSentence);
		$resultSubTheme->setSuccess($success);
		$resultSubTheme->setTimePassing($timePassing);
		$resultSubTheme->setLevelSuccess($levelSuccess);
		$resultSubTheme->setSousTheme($subTheme);

        $em->persist($resultSubTheme);
        $em->flush();
	}
}
