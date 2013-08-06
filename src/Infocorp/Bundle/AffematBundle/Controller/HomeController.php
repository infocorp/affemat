<?php

namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('InfocorpAffematBundle:Home:index.html.twig');

    }

}