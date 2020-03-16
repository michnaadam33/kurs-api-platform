<?php


namespace App\DataFixtures;


use App\Entity\Movie;
use App\Entity\Type;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixture extends Fixture
{
    public const ID_ROMANTIC = 'romantic';
    public const ID_COMENY = 'comedy';
    public const ID_ACTION = 'action';

    public function load(ObjectManager $manager)
    {
        $type1 = new Type('Romans');
        $manager->persist($type1);
        $this->addReference(self::ID_ROMANTIC, $type1);

        $type2 = new Type('Komedia');
        $manager->persist($type2);
        $this->addReference(self::ID_COMENY, $type2);

        $type3 = new Type('Sensacyjny');
        $manager->persist($type3);
        $this->addReference(self::ID_ACTION, $type3);

        $manager->flush();
    }

}