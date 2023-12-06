<?php

namespace App\Form;

use App\Entity\Sauce;
use App\Repository\SauceRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SauceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', ChoiceType::class , [
                'choices' => [
                    'Ketchup' => 'Ketchup',
                    'Mayonnaise' => 'Mayonnaise',
                    'Moutarde' => 'Moutarde',
                    'Sauce blanche' => 'Sauce blanche',
                    'Sauce barbecue' => 'Sauce barbecue',
                    'Sauce samouraï' => 'Sauce samouraï',
                    'Sauce andalouse' => 'Sauce andalouse',
                    'Sauce curry' => 'Sauce curry',
                    'Sauce algérienne' => 'Sauce algérienne',
                    'Sauce tartare' => 'Sauce tartare',
                    'Sauce béarnaise' => 'Sauce béarnaise',
                    'Sauce au poivre' => 'Sauce au poivre',
                    'Sauce au roquefort' => 'Sauce au roquefort',
                    'Sauce au bleu' => 'Sauce au bleu',
                    'Sauce au camembert' => 'Sauce au camembert',
                    'Sauce au chèvre' => 'Sauce au chèvre',
                    'Sauce au maroilles' => 'Sauce au maroilles',
                    'Sauce au munster' => 'Sauce au munster',
                    'Sauce au reblochon' => 'Sauce au reblochon',
                    'Sauce au saint-nectaire' => 'Sauce au saint-nectaire',
                    'Sauce au vacherin' => 'Sauce au vacherin',
                    'Sauce au vin blanc' => 'Sauce au vin blanc',
                    'Sauce au vin rouge' => 'Sauce au vin rouge',
                    'Sauce au vin jaune' => 'Sauce au vin jaune',
                    'Sauce au vin de noix' => 'Sauce au vin de noix',
                    'Sauce au vin de paille' => 'Sauce au vin de paille',
                    'Sauce au vin de Xérès' => 'Sauce au vin de Xérès',
                    'Sauce au vin de Madère' => 'Sauce au vin de Madère',
                    'Sauce au vin de Porto' => 'Sauce au vin de Porto',
                ],
                'label' => 'Liste des sauces',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ])
            ;
   }
    
   public function configureOptions(OptionsResolver $resolver): void
   {
       $resolver->setDefaults([
           'data_class' => Sauce::class,
       ]);
   }
}
