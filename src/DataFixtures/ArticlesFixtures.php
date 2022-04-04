<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Articles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{
  public const ARTICLES = [
    [
      "name" => "Tea - Lemon Green Tea",
      "value" => 17.50,
      "type" => "Grocery",
    ], [
      "name" => "Sambuca - Opal Nera",
      "value" => 64.25,
      "type" => "Automotive"
    ], [
      "name" => "- Cohoe 6 Oz",
      "value" => 5.0,
      "type" => "Tools"
    ],[
      "name" => " Lemon Green Tea",
      "value" => 7.30,
      "type" => "Grocery",
    ], [
      "name" => "Opal Nera",
      "value" => 4.90,
      "type" => "Automotive"
    ], [
      "name" => "Salmon Steak - Cohoe 6 Oz",
      "value" => 3.50,
      "type" => "Tools"
    ], [
      "name" => "- Cohoe 6 Oz",
      "value" => 5.0,
      "type" => "Tools"
    ],[
      "name" => " Lemon Green Tea",
      "value" => 7.30,
      "type" => "Grocery",
    ], [
      "name" => "Opal Nera",
      "value" => 4.90,
      "type" => "Automotive"
    ], [
      "name" => "Salmon Steak - Cohoe 6 Oz",
      "value" => 3.50,
      "type" => "Tools"
    ],
  ];

  public function load(ObjectManager $manager): void
  {
      for($x=0; $x<10; $x++) {
          foreach (self::ARTICLES as $key => $data) {
              $article = new Articles();
              $article->setName($data['name']);
              $article->setValue($data['value']);
              $article->setType($data['type']);
              $article->setUser($this->getReference('user_' . $x));

              $manager->persist($article);
          }
      }
      $manager->flush();
  }

  public function getDependencies()
  {
      return [
          UsersFixtures::class,
      ];
  }
}