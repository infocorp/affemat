<?php
namespace Infocorp\Bundle\AffematBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');
        $categoriesManager = $em->getRepository('ApplicationSonataNewsBundle:Category');

        return $this->render('InfocorpAffematBundle:News:index.html.twig', [
            'news' => $newsManager->findBy(['enabled' => 1]),
            'categories' => $categoriesManager->findBy(['enabled' => 1]),
            'subpage' => false,
        ]);
    }

    public function categoryAction($slug)
    {
    	$em = $this->getDoctrine()->getManager();
    	$newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');
    	$categoryManager = $em->getRepository('ApplicationSonataNewsBundle:Category');

    	$categories = $categoryManager->findBy(['enabled' => 1]);
    	$category = $categoryManager->findBy(['slug' => $slug, 'enabled' => 1]);

    	if (!$category) {
    		throw new NotFoundHttpException('Categoria não encontrada');
    	}

    	$news = $newsManager->findBy(['category' => $category, 'enabled' => 1]);

    	return $this->render('InfocorpAffematBundle:News:index.html.twig', [
    		'news' => $news,
    		'categories' => $categories,
    		'subpage' => true,
		]);
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');

        $news = $newsManager->findOneBy(['slug' => $slug, 'enabled' => 1]);

        if (!$news) {
        	throw new NotFoundHttpException('Notícia não encontrada');
        }

        return $this->render('InfocorpAffematBundle:News:view.html.twig', [
        	'news' => $news,
    	]);
    }
}