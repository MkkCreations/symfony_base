<?php
namespace App\DataFixtures;
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class CommentaireFixtures extends Fixture
{
    public const COMMENTAIRE_REFERENCE = 'Commentaire';
    public function load(ObjectManager $manager)
    {
        $commentaires = [
            "C'est trop bon !",
            "N'est pas mal",
            "C'est pas bon",
        ];

        foreach ($commentaires as $key => $message) {
            $commentaire = new Commentaire();
            $commentaire->setMessage($message);
            $manager->persist($commentaire);
            $this->addReference(self::COMMENTAIRE_REFERENCE . '_' . $key, $commentaire);
        }
    }
}