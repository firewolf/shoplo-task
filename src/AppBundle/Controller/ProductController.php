<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ProductType;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductForm;
use AppBundle\Dao\ProductDao;

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
            $targetRoute = $form->get ('save_add')->isClicked () ? 'new_product' : 'products';
            return $this->redirectToRoute($targetRoute);
        }
        
        return $this->render ('admin/new-product.html.twig', [
            'form' => $form->createView()
        ]);
        
    }
    
    /**
     *
     * @Route ("/products", name="products")
     * @param Request $request
     * @return Response
     */
    public function products (Request $request) : Response {
        $result = $this->dao->findAll ();
        echo '<pre>'; print_r ($result);
        return new Response ('test');
    }
    
}

