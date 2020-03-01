<?php


namespace App\DataFixtures;


use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActorFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /** @var Movie $movieSara */
        $movieSara = $this->getReference(MovieFixture::ID_SARA);
        /** @var Movie $movieCNP */
        $movieCNP = $this->getReference(MovieFixture::ID_CHLOPAKI_NIE_PLACZA);
        /** @var Movie $moviePsy */
        $moviePsy = $this->getReference(MovieFixture::ID_PSY);

        $actor1 = new Actor();
        $actor1->setFirstName('Bogusław');
        $actor1->setLastName("Linda");
        $actor1->setSex('male');
        $actor1->addMovie($movieSara);
        $actor1->addMovie($moviePsy);
        $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setFirstName("Agnieszka ");
        $actor2->setLastName("Włodarczyk");
        $actor2->setSex('female');
        $actor2->addMovie($movieSara);
        $manager->persist($actor2);

        $actor3 = new Actor();
        $actor3->setFirstName("Marek");
        $actor3->setLastName("Perepeczko");
        $actor3->setSex('male');
        $actor3->addMovie($movieSara);
        $manager->persist($actor3);

        $actor4 = new Actor();
        $actor4->setFirstName("Cezary");
        $actor4->setLastName("Pazura");
        $actor4->setSex('male');
        $actor4->addMovie($movieSara);
        $actor4->addMovie($movieCNP);
        $actor4->addMovie($moviePsy);
        $manager->persist($actor4);

        $actor5 = new Actor();
        $actor5->setFirstName("Paweł");
        $actor5->setLastName("Burczyk");
        $actor5->setSex('male');
        $actor5->addMovie($movieSara);
        $manager->persist($actor5);

        $actor6 = new Actor();
        $actor6->setFirstName("Maciej");
        $actor6->setLastName("Stuhr");
        $actor6->setSex('male');
        $actor6->addMovie($movieCNP);
        $manager->persist($actor6);

        $actor7 = new Actor();
        $actor7->setFirstName("Michał");
        $actor7->setLastName("Milowicz");
        $actor7->setSex('male');
        $actor7->addMovie($movieCNP);
        $manager->persist($actor7);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MovieFixture::class
        ];
    }
}