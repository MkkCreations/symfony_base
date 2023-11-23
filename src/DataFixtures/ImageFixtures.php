<?php
namespace App\DataFixtures;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class ImageFixtures extends Fixture
{
    public const IMAGE_REFERENCE = 'Image';
    public function load(ObjectManager $manager)
    {
        $images = [
            [
                "url" => "https://staticcookist.akamaized.net/wp-content/uploads/sites/22/2021/09/beef-burger.jpg",
                "altText" => "Beef Burger"
            ],
            [
                "url" => "https://images.unsplash.com/photo-1603064752734-4c48eff53d05?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YnVyZ2VyfGVufDB8fDB8fHww",
                "altText" => "Hamburger au boeuf"
            ],
            [
                "url" => "https://assets.epicurious.com/photos/5c745a108918ee7ab68daf79/16:9/w_3743,h_2105,c_limit/Smashburger-recipe-120219.jpg",
                "altText" => "Hamburger au poulet"
            ],
            [
                "url" => "https://wordpress.potagercity.fr/wp-content/uploads/2019/06/Burger-aux-oignons-caram%C3%A9lis%C3%A9s.jpg",
                "altText" => "Hamburger au poisson"
            ]
        ];

        foreach ($images as $key => $url) {
            $image = new Image();
            $image->setUrl($url['url']);
            $image->setAltText($url['altText']);
            $this->addReference(self::IMAGE_REFERENCE . '_' . $key, $image);
        }
    }
}