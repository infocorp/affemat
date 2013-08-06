<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SlideController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');

        $slides = $newsManager->findLastSlides(5);

        return $this->render('InfocorpAffematBundle:Block:slider.html.twig', [
            'slides' => $slides,
        ]);
    }
}