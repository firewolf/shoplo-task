<?php

namespace AppBundle\Query;

use AppBundle\Service\IProductService;

/**
 * 
 * 
 * @author tmroczkowski
 */
class GetProductList
{
    /**
     *
     * @var IProductService
     */
    private $productService;
    
    /**
     *
     * @param IProductService $productService
     */
    public function __construct(IProductService $productService) {
        $this->productService = $productService;
    }
    
    /**
     * 
     * @param array $criteria
     * @param int $limit
     * @param int $page
     * @return Result
     */
    public function execute (string $fieldName, string $direction, int $limit, int $page) : Result {
        return new Result(
            $this->productService->getList(
                $fieldName, 
                $direction, 
                $limit, 
                $page
            ), 
            $this->productService->countProducts ()
        );
    }
}

