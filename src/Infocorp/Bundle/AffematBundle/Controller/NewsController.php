<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $newsRepo = $em->getRepository('ApplicationSonataNewsBundle:Post');

        return $this->render('InfocorpAffematBundle:News:index.html.twig', [
            'news' => $newsRepo->findAll(),
        ]);
    }
}