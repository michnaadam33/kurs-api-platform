<?php


namespace App\DataFixtures;


use App\Entity\Movie;
use App\Entity\Type;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixture extends Fixture implements DependentFixtureInterface
{
    public const ID_SARA = 'move-1';
    public const ID_CHLOPAKI_NIE_PLACZA = 'move-2';
    public const ID_PSY = 'move-3';

    public function load(ObjectManager $manager)
    {
        /** @var Type $typeAction */
        $typeAction = $this->getReference(TypeFixture::ID_ACTION);
        /** @var Type $typeComedy */
        $typeComedy = $this->getReference(TypeFixture::ID_COMENY);
        /** @var Type $typeRomantic */
        $typeRomantic = $this->getReference(TypeFixture::ID_ROMANTIC);
        $movie1 = new Movie();
        $movie1->setTitle("Sara");
        $movie1->setCreatedAt(new DateTime("11-07-1997"));
        $movie1->setType($typeRomantic);
        $this->addReference(self::ID_SARA, $movie1);
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle("Chłopaki nie płaczą");
        $movie2->setCreatedAt(new DateTime("25-02-2000"));
        $movie2->setType($typeComedy);
        $this->addReference(self::ID_CHLOPAKI_NIE_PLACZA, $movie2);
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setTitle("Psy");
        $movie3->setCreatedAt(new DateTime("31-12-1992"));
        $movie3->setType($typeAction);
        $this->addReference(self::ID_PSY, $movie3);
        $manager->persist($movie3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [TypeFixture::class];
    }


}