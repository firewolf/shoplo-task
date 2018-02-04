<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\BrowserKit\Cookie;

/**
 * 
 * 
 * @author tmroczkowski
 */
abstract class AbstractTestController extends WebTestCase
{
    
    /**
     * 
     * @param Client $client
     */
    protected function logIn(Client $client)
    {
        $session = $client->getContainer()->get('session');
        
        $firewall_name = 'main';
        
        $token = new UsernamePasswordToken('test', null, $firewall_name, ['ROLE_ADD_PRODUCT']);
        $session->set('_security_' . $firewall_name, serialize($token));
        $session->save();
        
        $client->getCookieJar()->set(
            new Cookie($session->getName(), $session->getId())
        );
    }
    
}

