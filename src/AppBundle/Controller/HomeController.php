<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Home Controller
 * 
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("home/index.html.twig")
     */
    public function indexAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $content = $em->getRepository('AppBundle:Content')->findOneBy(array("selected" => true));
       
        return array(
            "content" => $content
        );
    }
    
    
}
