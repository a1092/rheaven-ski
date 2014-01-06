<?php

namespace RHeaven\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RHeavenUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
