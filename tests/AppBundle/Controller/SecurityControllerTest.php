<?php

namespace Tests\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * 
 * 
 * @author tmroczkowski
 */
class SecurityControllerTest extends AbstractTestController
{
    
    /**
     * 
     * 
     */
    public function testLoginPage()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/login');
        
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'login',
            $crawler->filter('#main-container form')->attr('name')
        );
        
    }
    
}
