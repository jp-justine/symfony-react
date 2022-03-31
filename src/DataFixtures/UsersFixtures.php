<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use datetime;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $user1 = new Users();
        $user1->setName("Sid Siddele");
        $user1->setMail("ssiddele0@merriam-webster.com");
        $user1->setAddress("441 Oriole Road");
        $user1->setPhone("7866752293");
        $user1->setBirthDate((new DateTime("1990-05-17")));

        for($i=0; $i<3; $i++){
            $user1->addArticle($this->getReference("article_0"));
        }

        $manager->persist($user1);
        
        $user2 = new Users();
        $user2->setName("Law Ballantine");
        $user2->setMail("lballantine1@wisc.edu");
        $user2->setAddress("42 Florence Pass");
        $user2->setPhone("6072242994");
        $user2->setBirthDate((new DateTime("1980-01-05")));

        for($i=0; $i<3; $i++){
            $user2->addArticle($this->getReference("article_1"));
        }

        $manager->persist($user2);

        $user3 = new Users();
        $user3->setName("Kim Doel");
        $user3->setMail("kdoel2@woothemes.com");
        $user3->setAddress("97636 Boyd Hill");
        $user3->setPhone("7948225426");
        $user3->setBirthDate((new DateTime("1988-10-25")));

        for($i=0; $i<3; $i++){
            $user3->addArticle($this->getReference("article_2"));
        }

        $manager->persist($user3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          ArticlesFixtures::class,
        ];
    }
}