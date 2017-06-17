<?php

namespace CidesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CidesBundle\Form\UserType;
use CidesBundle\Entity\User;

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
    public function addAction()
    {
        $user = new User();
        $form = $this->createCreateForm($user);

        return $this->render('CidesBundle:User:add.html.twig', array('form' => $form->createView()));
    }
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
                'action' => $this->generateUrl('cides_homepage_create'),
                'method' => 'POST'
            ));

        return $form;
    }
    public function createAction(Request $request)
    {
      $user = new User();
      $form = $this->createCreateForm($user);
      $form -> handleRequest($request);

      if($form -> isValid())
      {
            $password = $form->get('password')->getData();

            $encoder = $this->container->get('security.password_encoder');

            $encoded = $encoder->encodePassword($user, $password);

            $user->setPassword($encoded);

            $em =$this->getDoctrine()->getManager();
            $em-> persist($user);
            $em->flush();

          return $this ->redirectToRoute('cides_homepage_index');
      }
      return $this->render('CidesBundle:User:add.html.twig', array('form' => $form->createView()));
    }

}
