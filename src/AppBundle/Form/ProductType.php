<?php
namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;

class ProductType extends AbstractType
{
    
    public function buildForm (FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add ('name', null, ['label' => 'Nazwa'])
            ->add ('description', null, ['label' => 'Opis'])
            ->add ('price', null, ['label' => 'Cena'])
            ->add ('save', SubmitType::class, ['label' => 'Zapisz']);
        
    }
}

