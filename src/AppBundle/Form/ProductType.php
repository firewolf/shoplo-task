<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    
    public function buildForm (FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add ('name', TextType::class, ['label' => 'Nazwa:'])
            ->add ('description', TextareaType::class, ['label' => 'Opis:'])
            ->add ('price', TextType::class, ['label' => 'Cena [0-9]+(,[0,9]{1,2}):'])
            ->add ('save_add', SubmitType::class, ['label' => 'Zapisz i dodaj następny'])
            ->add ('save', SubmitType::class, ['label' => 'Zapisz']);
        
    }
}

