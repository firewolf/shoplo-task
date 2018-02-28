<?php

namespace AppBundle\Service;

use Ramsey\Uuid\Uuid;
use AppBundle\Entity\Product;
use AppBundle\Repository\IProductRepository;
use AppBundle\Factory\ProductViewFactory;
use AppBundle\Query\ProductView;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductServiceImpl implements IProductService
{
    
    /**
     *
     * @var IProductRepository
     */
    private $repository;
    
    /**
     * 
     * @var ProductViewFactory
     */
    private $productViewFactory;
    
    /**
     * 
     * @param IProductRepository $productRepository
     */
    public function __construct(
        IProductRepository $productRepository,
        ProductViewFactory $productViewFactory
    ) {
        $this->repository = $productRepository;
        $this->productViewFactory = $productViewFactory;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Service\IProductService::add()
     */
    public function add (Product $product) : void {
        $this->repository->save($product);
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Service\IProductService::getListQuery()
     */
    public function getList (string $orderBy, string $direction, int $startFrom, int $limit) : array {
        
        return array_map ([$this->productViewFactory, 'create'], $this->repository->findByCriteria (
            $orderBy,
            $direction,
            $startFrom,
            $limit
        ));
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Service\IProductService::getById()
     */
    public function getById (Uuid $id) : ProductView {
        return $this->productViewFactory->create (
            $this->repository->findById($id)
        );
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Service\IProductService::countProducts()
     */
    public function countProducts(): int {
        return $this->repository->countProducts();
    }

}

