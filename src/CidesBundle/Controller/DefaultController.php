<?php

namespace CidesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CidesBundle:Default:index.html.twig');
    }
}
