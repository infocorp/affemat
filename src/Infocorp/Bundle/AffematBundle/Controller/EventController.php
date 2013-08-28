<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $eventManager = $em->getRepository('InfocorpAffematBundle:Event');

        $events = $eventManager->findEvents();

        return $this->render('InfocorpAffematBundle:Event:list.html.twig', array(
            'events' => $events,
        ));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $eventManager = $em->getRepository('InfocorpAffematBundle:Event');

        $event = $eventManager->findEventBySlug($slug);

        if (!$event) {
            throw new NotFoundHttpException('Evento não encontrado');
        }

        return $this->render('InfocorpAffematBundle:Event:view.html.twig', array(
            'event' => $event,
        ));
    }
}