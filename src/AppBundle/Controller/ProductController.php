<?php

namespace AppBundle\Controller;

use Knp\Component\Pager\PaginatorInterface;
use AppBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SimpleBus\Message\Bus\MessageBus;
use AppBundle\Service\IProductService;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductController extends Controller
{
    
    /**
     * 
     * @var PaginatorInterface
     */
    private $paginator;
    
    /**
     * 
     * @var MessageBus
     */
    private $commandBus;
    
    /**
     * 
     * @var IProductService
     */
    private $productService;
    
    /**
     * 
     * @param PaginatorInterface $paginator
     * @param MessageBus $commandBus
     * @param IProductService $productListQuery
     */
    public function __construct (
        PaginatorInterface $paginator, 
        MessageBus $commandBus, 
        IProductService $productService
    ) {
        $this->paginator = $paginator;
        $this->commandBus = $commandBus;
        $this->productService = $productService;
    }
    
    /**
     * 
     * @Route ("/admin/new-product", name="new_product")
     * @param Request $request
     * @return Response
     */
    public function newProduct(Request $request) : Response {
        
        $form = $this->createForm(ProductType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $this->commandBus->handle($form->getData());
            
            return $this->redirectToRoute(
                $form->get ('save_add')->isClicked () ? 'new_product' : 'products'
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
        
        $page = $request->query->getInt('page', 1);
        
        $defaultSortFieldName = 'datetime';
        $defaultSortDirection = 'desc';
        $limit = 10;
        
        $sortFieldName = $request->query->get('sort', $defaultSortFieldName);
        $sortDirection = $request->query->get('direction', $defaultSortDirection);
        
        $viewList = $this->productService->getList(
            $sortFieldName, 
            $sortDirection, 
            $limit * ($page - 1), 
            $limit
        );
        
        $pagination = $this->paginator->paginate([], $page, 10,
            [
                'defaultSortFieldName' => $defaultSortFieldName,
                'defaultSortDirection' => $defaultSortDirection
            ]
        );
        
        $pagination->setItems ($viewList);
        $pagination->setTotalItemCount($this->productService->countProducts());
        
        return $this->render('product/product-list.html.twig', [
            'pagination' => $pagination
        ]);
    }
    
}

