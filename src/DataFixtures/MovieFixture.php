<?php


namespace App\DataFixtures;


use App\Entity\Movie;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixture extends Fixture
{
    public const ID_SARA = 'move-1';
    public const ID_CHLOPAKI_NIE_PLACZA = 'move-2';
    public const ID_PSY = 'move-3';

    public function load(ObjectManager $manager)
    {
        $movie1 = new Movie();
        $movie1->setTitle("Sara");
        $movie1->setCreateAt(new DateTime("11-07-1997"));
        $this->addReference(self::ID_SARA, $movie1);
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle("Chłopaki nie płaczą");
        $movie2->setCreateAt(new DateTime("25-02-2000"));
        $this->addReference(self::ID_CHLOPAKI_NIE_PLACZA, $movie2);
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setTitle("Psy");
        $movie3->setCreateAt(new DateTime("31-12-1992"));
        $this->addReference(self::ID_PSY, $movie3);
        $manager->persist($movie3);

        $manager->flush();
    }

}