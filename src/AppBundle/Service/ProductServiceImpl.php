<?php

namespace AppBundle\Service;

use Ramsey\Uuid\Uuid;
use AppBundle\Entity\Product;
use AppBundle\Repository\IProductRepository;

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
     * @param IProductRepository $productRepository
     */
    public function __construct(
        IProductRepository $productRepository
    ) {
        $this->repository = $productRepository;
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
        return $this->repository->findByCriteria (
            $orderBy, 
            $direction, 
            $startFrom, 
            $limit
        );
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \AppBundle\Service\IProductService::getById()
     */
    public function getById (Uuid $id) : Product {
        return $this->repository->findById($id);
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

