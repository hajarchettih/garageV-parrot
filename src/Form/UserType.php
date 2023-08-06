<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => "Nom"
            ])
            ->add('firstname', TextType::class, [
                'required' => true,
                'label' => "Prénom"
            ])
            ->add('phonenumber', NumberType::class, [
                'required' => true,
                'label' => "Numéro de téléphone",
                'scale' => 0,
                'attr' => ['maxlength' => 10]
            ])
            ->add('mail', EmailType::class, [
                'required' => true,
                'label' => "Adresse mail"
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'label' => "Votre message"
            ])
            ->add('save', SubmitType::class, [
                'required' => true,
                'label' => "Valider"
            ]);
    }
}