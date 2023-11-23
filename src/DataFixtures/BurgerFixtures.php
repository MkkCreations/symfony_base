<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BurgerFixtures extends Fixture implements DependentFixtureInterface
{
    public const BURGER_REFERENCE = 'Burger';

    public function getDependencies(): array
    {
        return [
            CommentaireFixtures::class,
            OignonFixtures::class,
            PainFixtures::class,
            SauceFixtures::class,
            ImageFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void
    {
        $burgers = [
            [
                'nom' => 'Burger 1',
                'image' => $this->getReference(ImageFixtures::IMAGE_REFERENCE . '_0'),
                'commentaire' => $this->getReference(CommentaireFixtures::COMMENTAIRE_REFERENCE . '_0'),
                'oignon' => $this->getReference(OignonFixtures::OIGNON_REFERENCE . '_0'),
                'pain' => $this->getReference(PainFixtures::PAIN_REFERENCE . '_0'),
                'sauce' => $this->getReference(SauceFixtures::SAUCE_REFERENCE . '_0'),
            ],
            [
                'nom' => 'Burger 2',
                'image' => $this->getReference(ImageFixtures::IMAGE_REFERENCE . '_1'),
                'commentaire' => $this->getReference(CommentaireFixtures::COMMENTAIRE_REFERENCE . '_1'),
                'oignon' => $this->getReference(OignonFixtures::OIGNON_REFERENCE . '_1'),
                'pain' => $this->getReference(PainFixtures::PAIN_REFERENCE . '_1'),
                'sauce' => $this->getReference(SauceFixtures::SAUCE_REFERENCE . '_1'),
            ],
            [
                'nom' => 'Burger 3',
                'image' => $this->getReference(ImageFixtures::IMAGE_REFERENCE . '_2'),
                'commentaire' => $this->getReference(CommentaireFixtures::COMMENTAIRE_REFERENCE . '_2'),
                'oignon' => $this->getReference(OignonFixtures::OIGNON_REFERENCE . '_2'),
                'pain' => $this->getReference(PainFixtures::PAIN_REFERENCE . '_2'),
                'sauce' => $this->getReference(SauceFixtures::SAUCE_REFERENCE . '_2'),
            ]
        ];

        foreach ($burgers as $key => $burgerData) {
            $burger = new Burger();
            $burger->setNom($burgerData['nom']);
            $burger->setImage($burgerData['image']);
            $burger->addCommentaire($burgerData['commentaire']);
            $burger->setOignon($burgerData['oignon']);
            $burger->setPain($burgerData['pain']);
            $burger->addSauce($burgerData['sauce']);
            $manager->persist($burger);
            $this->addReference(self::BURGER_REFERENCE . '_' . $key, $burger);
        }

        $manager->flush();
    }
}
