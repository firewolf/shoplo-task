<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Mailer\ProductMailer;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    
    /**
     *
     * @var ProductMailer
     */
    private $mailer;
    
    public function __construct (ProductMailer $mailer) {
        $this->mailer = $mailer;
    }
    
    /**
     * @Route("/", name="homepage")
     */
    public function main(Request $request) : Response
    {
        
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/mail-test", name="mail test")
     */
    public function testMail (Request $request) : Response {
        $result = $this->mailer->notify(new class extends Product {
            public $name = 'test';
            public $description = 'test description';
            public $price = '10,99';
            public $owner = 'test';
        });
            
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
