<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Terra\NovaBundle\Form\ContactType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TerraNovaBundle:Homepage:index.html.twig');
    }

	public function contactAction(Request $request)
	{
	    $form = $this->createForm(new ContactType());

	    if ($request->isMethod('POST')) {
	        $form->bind($request);

	        if ($form->isValid()) {
	            $message = \Swift_Message::newInstance()
	                ->setSubject($form->get('subject')->getData())
	                ->setFrom($form->get('email')->getData())
	                ->setTo('contact@example.com')
	                ->setBody(
	                    $this->renderView(
	                        'LCWebsiteBundle:Mail:contact.html.twig',
	                        array(
	                            'ip' => $request->getClientIp(),
	                            'name' => $form->get('name')->getData(),
	                            'message' => $form->get('message')->getData()
	                        )
	                    )
	                );

	            $this->get('mailer')->send($message);

	            $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

	            return $this->redirect($this->generateUrl('terra_nova_homepage'));
	        }
	    }

	    return $this->render('TerraNovaBundle:Homepage:contact.html.twig', array(
            'form'   => $form->createView(),
        ));
	}

}