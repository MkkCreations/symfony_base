<?php
namespace App\DataFixtures;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class ImageFixtures extends Fixture
{
    private const IMAGE_REFERENCE = 'Image';
    public function load(ObjectManager $manager)
    {
        $images = [
            "burger" => "burger.png",
        ];

        foreach ($images as $key => $url) {
            $image = new Image();
            $image->setUrl($url);
            $manager->persist($image);
            $this->addReference(self::IMAGE_REFERENCE . '_' . $key, $image);
        }
    }
}