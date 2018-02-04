<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends AbstractTestController
{
    public function testLogin()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/login');
        
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'login',
            $crawler->filter('#main-container form')->attr('name')
        );
        
//         $client->logIn ($client)
        
    }
    
}
