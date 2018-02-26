<?php

namespace Tests\AppBundle\Controller;

/**
 * 
 * DefaultController test case.
 */
class DefaultControllerTest extends AbstractTestController
{

    /**
     * 
     * Tests DefaultController->main()
     */
    public function testMain()
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains(
            'Welcome to Symfony',
            $crawler->filter('#container h1')->text()
        );
    }
}

