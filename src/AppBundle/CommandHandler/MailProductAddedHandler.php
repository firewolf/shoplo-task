<?php

namespace AppBundle\CommandHandler;

use AppBundle\Command\MailProductAddedCommand;
use Symfony\Component\Translation\TranslatorInterface;

class MailProductAddedHandler
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
     * @var TranslatorInterface
     */
    private $translator;
    
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
        string $from,
        TranslatorInterface $translator
    )
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->receivers = $receivers;
        $this->from = $from;
        $this->translator = $translator;
    }
    
    /**
     * 
     * @param MailProductAddedCommand $command
     */
    public function handle (MailProductAddedCommand $command) {
        
        $message = new \Swift_Message();
        $message->setSubject($this->translator->trans('subject.added_new_product'));
        $message->setFrom($this->from);
        $message->setTo($this->receivers);
        $message->setBody($this->twig->render('Emails/product-notify.html.twig', [
            'product' => $command->product
        ]), 'text/html');
        
        $this->mailer->send($message);
    }
}

