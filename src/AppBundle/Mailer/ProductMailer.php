<?php

namespace AppBundle\Mailer;

use AppBundle\Entity\Product;

/**
 * 
 * 
 * @author tmroczkowski
 */
class ProductMailer
{

    /**
     *
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * 
     * @var \Twig_Environment
     */
    private $twig;
    
    /**
     * 
     * @var array - lista adresów odbiorców notyfikacji
     */
    private $receivers = [];

    /**
     * 
     * @var string
     */
    private $from;
    
    /**
     * 
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $twig
     * @param array $receivers
     * @param string $from
     */
    public function __construct(
        \Swift_Mailer $mailer, 
        \Twig_Environment $twig, 
        array $receivers,
        string $from
    )
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->receivers = $receivers;
        $this->from = $from;
    }

    /**
     * 
     * @param Product $product
     * @return number
     */
    public function notify(Product $product)
    {
        $body = $this->twig->render('Emails/product-notify.html.twig', [
            'product' => $product
        ]);
        
        return $this->mailer->send(
            (new \Swift_Message('Dodano nowy produkt'))
                ->setFrom($this->from)
                ->setTo($this->receivers)
                ->setBody($body, 'text/html')
        );
    }
}

