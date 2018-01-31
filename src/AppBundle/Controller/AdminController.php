<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ProductType;
use AppBundle\Entity\Product;

class AdminController extends Controller
{
    
    /**
     * @Route ("/admin/new-product", name="new product")
     * @param Request $request
     */
    public function newProductAction(Request $request) : Response {
        
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        
        return $this->render ('admin/new-product.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
}

