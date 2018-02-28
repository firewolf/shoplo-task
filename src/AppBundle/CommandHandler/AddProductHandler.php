<?php

namespace AppBundle\CommandHandler;

use AppBundle\Factory\ProductFactory;
use AppBundle\Service\IProductService;
use AppBundle\Command\AddProductCommand;

/**
 * 
 * 
 * @author tmroczkowski
 */
class AddProductHandler
{
    
    /**
     *
     * @var IProductService
     */
    private $productService;
    
    /**
     *    
     * @var ProductFactory
     */
    private $productFactory;
    
    /**
     * 
     * @param IProductService $productService
     */
    public function __construct(
        IProductService $productService, 
        ProductFactory $productFactory
    ) {
        $this->productService = $productService;
        $this->productFactory = $productFactory;
    }
    
    /**
     * 
     * @param AddProductCommand $command
     */
    public function handle (AddProductCommand $command) : void {
        
        $product = $this->productFactory->create ($command);
        
        $this->productService->add ($product);
    }
}

