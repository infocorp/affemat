<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function emailAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Formulário de contato - Affemat')
                ->setFrom($request->request->get('email'))
                ->setTo('eduardomrb@gmail.com')
                ->setBody(
                    $this->renderView(
                        'InfocorpAffematBundle:Email:email.txt.twig',
                        [
                            'message' => $request->request->get('message'),
                            'name'    => $request->request->get('name'),
                        ]
                    )
                )
            ;

            if ($this->get('mailer')->send($message)) {
            	$this->get('session')->getFlashBag()->add('success', 'Mensagem enviada com sucesso');
            } else {
            	$this->get('session')->getFlashBag()->add(
            		'error', 
            		'Não foi possível enviar mensagem, tente novamente mais tarde'
        		);
            }
        }

        return $this->render('InfocorpAffematBundle:Contact:contact.html.twig');
    }
}