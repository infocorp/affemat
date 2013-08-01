<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function emailAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Test')
            ->setFrom('eduardomrb@gmail.com')
            ->setTo('eduardomrb@gmail.com')
            ->setBody(
                $this->renderView(
                    'InfocorpAffematBundle:Email:email.txt.twig',
                    ['message' => 'Email enviado com sucesso']
                )
            )
        ;

        $this->get('mailer')->send($message);

        return $this->render('InfocorpAffematBundle:Default:index.html.twig', ['name' => 'Deu Certo']);
    }
}