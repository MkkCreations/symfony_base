<?php

namespace App\Form;

use App\Entity\Burger;
use App\Entity\Image;
use App\Entity\Oignon;
use App\Entity\Pain;
use App\Entity\Sauce;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BurgerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom du burger',
                'attr' => [
                    'placeholder' => 'Nom du burger'
                ]
            ])
            ->add('image', EntityType::class, [
                'label' => 'Image du burger',
                'class' => Image::class,
                'choice_label' => 'url',
                'placeholder' => 'Image du burger'
            ])

            ->add('pain', EntityType::class, [
                'class' => Pain::class,
                'choice_label' => function(Pain $pain) {
                    return sprintf('(%d) %s', $pain->getId(), $pain->getNom());
                },
                'label' => 'Pain du burger',
                'multiple' => false,
                'placeholder' => 'Pain du burger'
            ])

            ->add('oignon', EntityType::class, [
                'class' => Oignon::class,
                'choice_label' => function(Oignon $oignon) {
                    return sprintf('(%d) %s', $oignon->getId(), $oignon->getNom());
                },
                'label' => 'Oignon du burger',
                'multiple' => true,
                'placeholder' => 'Oignon du burger'
            ])

            ->add('sauce', EntityType::class, [
                'class' => Sauce::class,
                'choice_label' => function(Sauce $sauce) {
                    return sprintf('(%d) %s', $sauce->getId(), $sauce->getNom());
                },
                'label' => 'Sauce du burger',
                'multiple' => true,
                'placeholder' => 'Sauce du burger'
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Créer le burger'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Burger::class
        ]);
    }
}
