<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('year')
            ->add('fuel')
            ->add('kilometer')
            ->add('price')
            ->add('details')
            ->add('carbody')
            ->add('exteriorcolor')
            ->add('interiorcolor')
            ->add('typeengine')
            ->add('displacement')
            ->add('power')
            ->add('gearbox')
            ->add('speed')
            ->add('airconditioner')
            ->add('audiosystem')
            ->add('navigationsystem')
            ->add('seating')
            ->add('security')
            ->add('other')
            ->add('state')
            ->add('maintenancehistory')
            ->add('tires')
            ->add('photo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
