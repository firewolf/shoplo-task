<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * 
 * 
 * @author Symfony
 */
class SecurityController extends Controller
{
    
    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        
        return $this->render('security/login.html.twig', [
            'last_username' => $authUtils->getLastUsername(),
            'error' => $authUtils->getLastAuthenticationError(),
        ]);
    }
    
}

