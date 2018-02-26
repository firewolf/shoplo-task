<?php

namespace Tests\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductControllerTest extends AbstractTestController
{
    
    /**
     * 
     */
    public function testProducts()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/products');
        
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'product-list',
            $crawler->filter('#main-container table')->attr('id')
        );
        
    }
    
    public function testNewProduct () {
        
        $client = static::createClient();
        $client->followRedirects ();
        
        $crawler = $client->request('GET', '/admin/new-product');
        
        $this->assertEquals(
            Response::HTTP_OK, 
            $client->getResponse()->getStatusCode()
        );
        
        $this->assertContains(
            'login',
            $crawler->filter('#main-container form')->attr('name')
        );
        
    }
    
    public function testNewProductLogged () {
        
        $client = static::createClient();
        
        $this->login ($client);
        
        $crawler = $client->request('GET', '/admin/new-product');
        $response = $client->getResponse()->getStatusCode();
        
        $this->assertEquals(Response::HTTP_OK, $response);
        $this->assertContains(
            'product',
            $crawler->filter('#main-container form')->attr('name')
        );
    }
}
