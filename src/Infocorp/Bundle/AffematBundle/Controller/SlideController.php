<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Infocorp\Bundle\AffematBundle\Entity\SlideInterface;
use Infocorp\Bundle\AffematBundle\Entity\FeaturedRepository;

class SlideController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $slideManager = $em->getRepository('InfocorpAffematBundle:Featured');

        return $this->renderSlide(
            'InfocorpAffematBundle:Block:slider.html.twig',
            $slideManager,
            5
        );
    }

    private function renderSlide($template, SlideInterface $slideManager, $limit, array $options = array())
    {
        $options['slides'] = $slideManager->findLastSlides($limit);
        return $this->render($template, $options);
    }
}