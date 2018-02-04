<?php

namespace AppBundle\Controller;

use Knp\Component\Pager\PaginatorInterface;
use AppBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Mailer\ProductMailer;
use AppBundle\Form\ProductForm;
use AppBundle\Factory\ProductFactory;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductController extends Controller
{
    
    /**
     * 
     * @var ProductRepository
     */
    private $repository;
    
    /**
     * 
     * @var PaginatorInterface
     */
    private $paginator;
    
    /**
     *
     * @var ProductMailer
     */
    private $mailer;
    
    /**
     * 
     * @param ProductRepository $repository
     * @param PaginatorInterface $paginator
     * @param ProductMailer $mailer
     */
    public function __construct (ProductRepository $repository, PaginatorInterface $paginator, ProductMailer $mailer) {
        $this->repository = $repository;
        $this->paginator = $paginator;
        $this->mailer = $mailer;
    }
    
    /**
     * 
     * @Route ("/admin/new-product", name="new_product")
     * @param Request $request
     * @return Response
     */
    public function newProduct(Request $request) : Response {
        
        $productForm = new ProductForm();
        
        $form = $this->createForm(ProductType::class, $productForm);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $product = $this->repository->save(
                (new ProductFactory())->form2product ($productForm, $this->getUser ())
            );
            
            if ($product) {
                $this->mailer->notify ($product);
            }
            
            return $this->redirectToRoute($form->get ('save_add')->isClicked () ? 
                'new_product' : 
                'products'
            );
        }
        
        return $this->render ('product/new-product.html.twig', [
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
        
        return $this->render('product/product-list.html.twig', [
            'pagination' => $this->paginator->paginate(
                $this->repository->getPaginatorQuery (),
                $request->query->getInt('page', 1),
                10,
                [
                    'defaultSortFieldName' => 'product.datetime',
                    'defaultSortDirection' => 'desc',
                ]
            )
        ]);
    }
    
}

