<?php

namespace App\Form;

use App\Entity\Constat;
use App\Entity\Expert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Constat1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_incident')
            ->add('heure_incident')
            ->add('description')
            ->add('cordonnees_des_conducteurs')
            ->add('images_de_deux_vehicules_accidentees')
            ->add('temoins')
            ->add('expert', EntityType::class, [
                'class' => Expert::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Constat::class,
        ]);
    }
}
