<?php
namespace App\DataFixtures;

use App\Entity\Oignon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class OignonFixtures extends Fixture
{
    public const OIGNON_REFERENCE = 'Oignon';
    
    public function load(ObjectManager $manager)
    {
        $nomsOignons = [
            'Oignon blanc',
            'Oignon rouge',
            'Oignon jaune',
            'Oignon vert',
            'Oignon doux',
            'Oignon de Roscoff'
        ];

        foreach ($nomsOignons as $key => $nomOignon) {
            $oignon = new Oignon();
            $oignon->setNom($nomOignon);
            $manager->persist($oignon);
            $this->addReference(self::OIGNON_REFERENCE . '_' . $key, $oignon);
        }

        $manager->flush();
    }
}