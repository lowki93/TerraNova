<?php

namespace Terra\NovaBundle\Authentification;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserRedirection implements AuthenticationSuccessHandlerInterface
{
    private $router;

    public function __construct(RouterInterface $router){
        $this->router = $router;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token){

    	$Roles = $token->getUser()->getRoles();

    	if (in_array("ROLE_ENSEIGNANT", $Roles)) {
    		return new RedirectResponse($this->router->generate('terra_nova_enseigant_index'));
    	} else if (in_array("ROLE_ADMIN", $Roles)){
    		return new RedirectResponse($this->router->generate('terra_nova_admin_index'));
    	}

    }
}