<?php
namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;

class ProductType extends AbstractType
{
    
    public function buildForm (FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add ('name')
            ->add ('description')
            ->add ('price')
            ->add ('save', SubmitType::class);
        
    }
}

