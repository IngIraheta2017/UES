<?php

namespace CidesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $users = $em->getRepository('CidesBundle:User')->findAll();
      // $res = 'Lista de Usuarios: <br />';
      //  foreach ($users as $user) {
      //    # code...
      //    $res .= 'Usuarios' . $user->getUsername();
      //  }
      //   #return $this->render('CidesBundle:Default:index.html.twig');
      //   return new Response($res);
      return $this->render('CidesBundle:User:index.html.twig', array('users' => $users));
    }

}
