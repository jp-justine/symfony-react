<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;
use DateTime;


class UsersFixtures extends Fixture
{
  const USERS = [
    [
      "first_name" => "Sid",
      "last_name" => "Siddele",
      "email" => "ssiddele0@merriam-webster.com",
      "address" => "441 Oriole Road",
      "phone" => "7866752293",
      "birthDate" => "2019-04-11"
    ], [
      "first_name" => "Law",
      "last_name" => "Ballantine",
      "email" => "lballantine1@wisc.edu",
      "address" => "42 Florence Pass",
      "phone" => "6072242994",
      "birthDate" => "2020-10-15"
    ], [
      "first_name" => "Kim",
      "last_name" => "Doel",
      "email" => "kdoel2@woothemes.com",
      "address" => "97636 Boyd Hill",
      "phone" => "7948225426",
      "birthDate" => "2020-02-08"
    ], [
      "first_name" => "Vern",
      "last_name" => "Garwood",
      "email" => "vgarwood3@istockphoto.com",
      "address" => "91269 Porter Center",
      "phone" => "5159356211",
      "birthDate" => "2019-06-23"
    ], [
      "first_name" => "Eugenio",
      "last_name" => "Gutans",
      "email" => "egutans4@canalblog.com",
      "address" => "77594 Reindahl Alley",
      "phone" => "9282263912",
      "birthDate" => "2019-03-24"
    ], [
      "first_name" => "Larissa",
      "last_name" => "Gladdin",
      "email" => "lgladdin5@bbb.org",
      "address" => "0408 Everett Junction",
      "phone" => "2323790378",
      "birthDate" => "2020-07-13"
    ], [
      "first_name" => "Anatole",
      "last_name" => "Brocklehurst",
      "email" => "abrocklehurst6@bloglines.com",
      "address" => "90 Del Mar Alley",
      "phone" => "2572851458",
      "birthDate" => "2022-01-26"
    ], [
      "first_name" => "Mae",
      "last_name" => "Stourton",
      "email" => "mstourton7@rakuten.co.jp",
      "address" => "54389 Burrows Avenue",
      "phone" => "1264253540",
      "birthDate" => "2020-01-10"
    ], [
      "first_name" => "Thomas",
      "last_name" => "Mycroft",
      "email" => "tmycroft8@amazonaws.com",
      "address" => "6196 Schurz Parkway",
      "phone" => "8928455640",
      "birthDate" => "2019-04-01"
    ], [
      "first_name" => "Dylan",
      "last_name" => "Denley",
      "email" => "ddenley9@spiegel.de",
      "address" => "2 Melrose Circle",
      "phone" => "2271561385",
      "birthDate" => "2018-09-10"
    ], [
      "first_name" => "Fairleigh",
      "last_name" => "Ilyenko",
      "email" => "filyenkoa@indiegogo.com",
      "address" => "0638 Warbler Center",
      "phone" => "1001348647",
      "birthDate" => "2018-08-29"
    ], [
      "first_name" => "Zeb",
      "last_name" => "Upcott",
      "email" => "zupcottb@google.fr",
      "address" => "154 Kensington Alley",
      "phone" => "6608393722",
      "birthDate" => "2020-01-01"
    ], [
      "first_name" => "Elicia",
      "last_name" => "Erridge",
      "email" => "eerridgec@cbsnews.com",
      "address" => "4304 Lakeland Circle",
      "phone" => "4029379762",
      "birthDate" => "2020-04-13"
    ], [
      "first_name" => "Jud",
      "last_name" => "Gossage",
      "email" => "jgossaged@typepad.com",
      "address" => "4588 Killdeer Crossing",
      "phone" => "4168974891",
      "birthDate" => "2019-04-23"
    ], [
      "first_name" => "Baldwin",
      "last_name" => "Edeler",
      "email" => "bedelere@nyu.edu",
      "address" => "01958 Cascade Lane",
      "phone" => "6295899416",
      "birthDate" => "2021-02-23"
    ], [
      "first_name" => "Carmela",
      "last_name" => "Janoschek",
      "email" => "cjanoschekf@qq.com",
      "address" => "64773 Golf Course Pass",
      "phone" => "1794352955",
      "birthDate" => "2021-11-10"
    ], [
      "first_name" => "Ruthanne",
      "last_name" => "Simmig",
      "email" => "rsimmigg@illinois.edu",
      "address" => "763 Messerschmidt Park",
      "phone" => "8263875479",
      "birthDate" => "2020-05-11"
    ], [
      "first_name" => "Alfonso",
      "last_name" => "Sherebrook",
      "email" => "asherebrookh@ezinearticles.com",
      "address" => "38614 Duke Avenue",
      "phone" => "3173384970",
      "birthDate" => "2019-01-19"
    ], [
      "first_name" => "Russell",
      "last_name" => "McPeck",
      "email" => "rmcpecki@comcast.net",
      "address" => "595 Lerdahl Point",
      "phone" => "6826985399",
      "birthDate" => "2022-02-16"
    ], [
      "first_name" => "Novelia",
      "last_name" => "Charnock",
      "email" => "ncharnockj@webeden.co.uk",
      "address" => "60 Oak Valley Parkway",
      "phone" => "9495022897",
      "birthDate" => "2019-04-28"
    ], [
      "first_name" => "Donetta",
      "last_name" => "Crossingham",
      "email" => "dcrossinghamk@rakuten.co.jp",
      "address" => "0447 Crownhardt Terrace",
      "phone" => "3528185382",
      "birthDate" => "2020-08-18"
    ], [
      "first_name" => "Skelly",
      "last_name" => "Kembery",
      "email" => "skemberyl@google.cn",
      "address" => "25472 Thackeray Center",
      "phone" => "9976447777",
      "birthDate" => "2020-12-26"
    ],

  ];

  public function load(ObjectManager $manager)
  {

    foreach (self::USERS as $data) {
      $user = (new Users())
        ->setFirstName($data['first_name'])
        ->setLastName($data['last_name'])
        ->setMail($data['email'])
        ->setAddress($data['address'])
        ->setPhonenumber($data['phone'])
        ->setBirthDate((new DateTime(($data['birthDate'])))
        );
      $manager->persist($user);
    }

    $manager->flush();
  }
}
