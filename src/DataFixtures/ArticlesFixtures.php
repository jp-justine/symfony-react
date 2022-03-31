<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Articles;



class ArticlesFixtures extends Fixture 
{
  const ARTICLES = [
    [
    "name"=> "Tea - Lemon Green Tea",
    "value"=> 17,
    "type"=> "Grocery",
  ], [
    "name"=> "Sambuca - Opal Nera",
    "value"=> 64,
    "type"=> "Automotive"
  ], [
    "name"=> "Salmon Steak - Cohoe 6 Oz",
    "value"=> 35,
    "type"=> "Tools"
  ],
  ];

  public function load(ObjectManager $manager): void
  {
    foreach (self::ARTICLES as $key => $article) {
      $article = (new Articles())
      ->setName($article['name'])
      ->setValue($article['value'])
      ->setType($article['type']);

      $manager->persist($article);
      
      $this->addReference("article_" . $key, $article);
    }

    $manager->flush();
  }
}
