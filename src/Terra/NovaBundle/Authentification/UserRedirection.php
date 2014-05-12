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
                $user = $token->getUser();
                $etablissement = $user->getEtablissement()->getId();
                if($etablissement == 0)
                    return new RedirectResponse($this->router->generate('etablissement'));
                else
                    return new RedirectResponse($this->router->generate('terra_nova_theme_index'));
    	} else if (in_array("ROLE_ADMIN", $Roles)){
    		return new RedirectResponse($this->router->generate('terra_nova_admin_index'));
    	} else if (in_array("ROLE_SUPER_ADMIN", $Roles)){
            return new RedirectResponse($this->router->generate('terra_nova_admin_index'));
        }

    }
}