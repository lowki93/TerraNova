<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController as Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
		$data = $request->request->all();
		$username = $data['username'];
		$password = $data['password'];

		// Pour récupérer le service UserManager du bundle
		$userManager = $this->get('fos_user.user_manager');

		$user = $userManager->loadUserByUsername($username);
	    $encoder = $this->get('security.encoder_factory')->getEncoder($user);
	    $encodedPass = $encoder->encodePassword($password, $user->getSalt());

		// Pour charger un utilisateur
		$user = $userManager->findUserBy(array('username' => $username, 'password' => $encodedPass));

		if(count($user) == 0 ) {
			$response['teacher'] = false;
	    	return $this->handleView($this->view($response, 200));
		}

		if(count($user->getSeance()) != 0) {
			$seance =count($user->getSeance());

			for ($i=0; $i < $seance; $i++) {
				$dateSeance = date_format($user->getSeance()[$i]->getDate(), 'Y-m-d');
				$classId = $user->getSeance()[$i]->getClasse()->getId();

				if($dateSeance !== $date || $classId !== $user->getCurrentClass()->getId()) {
					unset($user->getSeance()[$i]);
				}
			}
		}
	    
	    return $this->handleView($this->view($user, 200));
	}

	public function studentLoginAction(Request $request)
	{	
		$data = $request->request->all();
		$enseignantId = $data['enseignant_id'];
		$classeId = $data['class_id'];
		$login = $data['login'];
		// $enseignantId = "5";
		// $classeId = "2";
		// $login = "Jordan";

		$em = $this->getDoctrine();

		$class = $em->getRepository('TerraNovaBundle:Classe')->findById($classeId);
		$student = $em->getRepository('TerraNovaBundle:Student')->findByStudent($login,$class);

	    return $this->handleView($this->view($student, 200));
	}

	public function updateAvatarAction(Request $request)
	{	
		$data = $request->request->all();
		$studentId = $data['student_id'];
		$avatar = $data['avatar'];
		// $studentId = "1";
		// $avatar = "55844844";

		$em = $this->getDoctrine();
	    $student = $em->getRepository('TerraNovaBundle:Student')->unSetAvatar($studentId,$avatar);

	    if($student == 1)
			$response['good'] = true;	
	    else
			$response['good'] = false;

	    return $this->handleView($this->view($response, 200));
	}

	public function resultSubThemeAction(Request $request)
	{
		$data = $request->request->all();
		$seanceId = $data['seance_id'];
		$studentId = $data['student_id'];
		$cozeText = $data['cozeText'];
		$dragCozeText = $data['dragCozeText'];
		$trueFalse = $data['trueFalse'];
		$freeSentence = $data['freeSentence'];
		$success = $data['success'];
		$raTime = date_create_from_format('H:i:s', $data['raTime']);
		$gameTime = date_create_from_format('H:i:s', $data['gameTime']);
		$timePassing = date_create_from_format('H:i:s', $data['timePassing']);
		$levelSuccess = $data['levelSuccess'];
		$subThemeId = $data['subTheme_id'];

		// $seanceId = 2;
		// $studentId = 1;
		// $cozeText = "soleil,vapeur d'eau,nuages,s'infiltre,nappe phréatique,source,ruisselle,fleuves";
		// $dragCozeText = "false,false,false,true,false,true,false,true";
		// $trueFalse = "false,false,false";
		// $freeSentence = "je suis Sherilybn Kamga";
		// $success = 100;
		// $raTime = new DateTime('0000-00-00 0:10');
		// $gameTime = new DateTime('0000-00-00 0:10');
		// $timePassing = new DateTime('0000-00-00 0:20');
		// $levelSuccess = "or";
		// $subThemeId = 4;

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
		$resultSubTheme->setRaTime($raTime);
		$resultSubTheme->setGameTime($gameTime);
		$resultSubTheme->setTimePassing($timePassing);
		$resultSubTheme->setLevelSuccess($levelSuccess);
		$resultSubTheme->setSousTheme($subTheme);

		$em->persist($resultSubTheme);
        $em->flush();

		$result = $em->getRepository('TerraNovaBundle:ResultStudent')->findByStudent($student);

		$newTimePassing = $result[0]->getTimePassing();

		$diffHours = $timePassing->format('H');
		$diffMin = $timePassing->format('i');

		$newTimePassing->modify('+'.$diffHours.' hours +'.$diffMin.' minutes');

		$oldSuccess = $result[0]->getSuccess();

		if($oldSuccess == 0)
			$newSuccess = $oldSuccess + $success;
		else
			$newSuccess = ($oldSuccess + $success)/2;

		$newsResult = $em->getRepository('TerraNovaBundle:ResultStudent')->updateResult($student,$newSuccess,$newTimePassing);

		if($newsResult == 1)
			$response['good'] = true;	
	    else
			$response['good'] = false;

	    return $this->handleView($this->view($response, 200));
	}
}
