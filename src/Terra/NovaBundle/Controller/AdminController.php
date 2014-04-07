<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function homeAction()
    {
        return $this->render('TerraNovaBundle:Admin:index.html.twig');
    }
}