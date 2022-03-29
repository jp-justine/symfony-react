<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Items;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ItemsFixtures extends Fixture implements DependentFixtureInterface
{
  const ITEMS = [
    [
    "name"=> "Tea - Lemon Green Tea",
    "value"=> 17,
    "type"=> "Grocery"
  ], [
    "name"=> "Sambuca - Opal Nera",
    "value"=> 64,
    "type"=> "Automotive"
  ], [
    "name"=> "Salmon Steak - Cohoe 6 Oz",
    "value"=> 35,
    "type"=> "Tools"
  ], [
    "name"=> "Juice - Apple, 341 Ml",
    "value"=> 90,
    "type"=> "Tools"
  ], [
    "name"=> "Apricots - Dried",
    "value"=> 81,
    "type"=> "Jewelry"
  ], [
    "name"=> "Relish",
    "value"=> 32,
    "type"=> "Movies"
  ], [
    "name"=> "Wine - Delicato Merlot",
    "value"=> 24,
    "type"=> "Outdoors"
  ], [
    "name"=> "Beer - Sleemans Honey Brown",
    "value"=> 60,
    "type"=> "Industrial"
  ], [
    "name"=> "External Supplier",
    "value"=> 80,
    "type"=> "Beauty"
  ], [
    "name"=> "Papayas",
    "value"=> 12,
    "type"=> "Tools"
  ], [
    "name"=> "Puree - Mango",
    "value"=> 31,
    "type"=> "Music"
  ], [
    "name"=> "Basil - Thai",
    "value"=> 29,
    "type"=> "Computers"
  ], [
    "name"=> "Bread - Olive",
    "value"=> 3,
    "type"=> "Toys"
  ], [
    "name"=> "Coffee Decaf Colombian",
    "value"=> 18,
    "type"=> "Toys"
  ], [
    "name"=> "Veal - Heart",
    "value"=> 4,
    "type"=> "Outdoors"
  ], [
    "name"=> "Samosa - Veg",
    "value"=> 65,
    "type"=> "Garden"
  ], [
    "name"=> "Bagel - Sesame Seed Presliced",
    "value"=> 99,
    "type"=> "Outdoors"
  ], [
    "name"=> "Bread - Focaccia Quarter",
    "value"=> 24,
    "type"=> "Garden"
  ], [
    "name"=> "Peas Snow",
    "value"=> 53,
    "type"=> "Beauty"
  ], [
    "name"=> "Spice - Onion Powder Granulated",
    "value"=> 78,
    "type"=> "Shoes"
  ], [
    "name"=> "Yams",
    "value"=> 11,
    "type"=> "Baby"
  ], [
    "name"=> "Puree - Raspberry",
    "value"=> 62,
    "type"=> "Tools"
  ]

  ];

  public function load(ObjectManager $manager)
  {
    $user = $this->getReference('user_user');
    foreach (self::ITEMS as $data) {
      $item = (new Items())
        ->setName($data['name'])
        ->setValue($data['value'])
        ->setType($data['type'])
        ->setItemOwner($user);

      $manager->persist($item);
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
