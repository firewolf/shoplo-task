<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ProductType;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductForm;
use AppBundle\dao\ProductDao;

class ProductController extends Controller
{
    /**
     * 
     * @var ProductDao
     */
    private $dao;
    
    public function __construct (ProductDao $dao) {
        $this->dao = $dao;
    }
    
    /**
     * 
     * @Route ("/admin/new-product", name="new_product")
     * @param Request $request
     */
    public function newProduct(Request $request) : Response {
        
        $productForm = new ProductForm();
        
        $form = $this->createForm(ProductType::class, $productForm);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->dao->save($productForm, $this->getUser ());
            //if ($form->get('save_add'))
            return $this->redirectToRoute('success');
        }
        
        return $this->render ('admin/new-product.html.twig', [
            'form' => $form->createView()
        ]);
        
    }
    
    /**
     * 
     * @Route ("/admin/success", name="success")
     * @param Request $request
     * @return Response
     */
    public function success (Request $request) : Response {
        return new Response ("produkt dodany");
    }
    
    /**
     *
     * @Route ("/products", name="success")
     * @param Request $request
     * @return Response
     */
    public function products (Request $request) : Response {
        $result = $this->dao->findAll ();
        echo '<pre>'; print_r ($result);
        return new Response ('test');
    }
    
}

