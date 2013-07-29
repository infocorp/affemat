<?php

namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InfocorpAffematBundle:Default:index.html.twig', array('name' => 'name'));
    }

    public function noticiasAction()
    {
        return $this->render('InfocorpAffematBundle:Default:index.html.twig', ['name' => 'Marcelon']);
    }
}
