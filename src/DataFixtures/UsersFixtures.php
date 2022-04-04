<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Users;
use DateTime;

class UsersFixtures extends Fixture
{
  const USERS = [
    [
      "name" => "Sid Siddele",
      "mail" => "ssiddele0@merriam-webster.com",
      "address" => "441 Oriole Road",
      "phone" => "7866752293",
      "birthDate" => "2018-09-10"
    ], [
      "name" => "Law Ballantine",
      "mail" => "lballantine1@wisc.edu",
      "address" => "42 Florence Pass",
      "phone" => "6072242994",
      "birthDate" => "2022-02-16"
    ], [
      "name" => "Kim Doel",
      "mail" => "kdoel2@woothemes.com",
      "address" => "97636 Boyd Hill",
      "phone" => "7948225426",
      "birthDate" => "2019-03-24"
    ], [
      "name" => "Vern Garwood",
      "mail" => "vgarwood3@istockphoto.com",
      "address" => "91269 Porter Center",
      "phone" => "5159356211",
      "birthDate" => "2019-06-23"
    ], [
      "name" => "Eugenio Gutans",
      "mail" => "egutans4@canalblog.com",
      "address" => "77594 Reindahl Alley",
      "phone" => "9282263912",
      "birthDate" => "2019-03-24"
    ], [
      "name" => "Larissa Gladdin",
      "mail" => "lgladdin5@bbb.org",
      "address" => "0408 Everett Junction",
      "phone" => "2323790378",
      "birthDate" => "2020-07-13"
    ], [
      "name" => "Anatole Brocklehurst",
      "mail" => "abrocklehurst6@bloglines.com",
      "address" => "90 Del Mar Alley",
      "phone" => "2572851458",
      "birthDate" => "2022-01-26"
    ], [
      "name" => "Mae Stourton",
      "mail" => "mstourton7@rakuten.co.jp",
      "address" => "54389 Burrows Avenue",
      "phone" => "1264253540",
      "birthDate" => "2020-01-10"
    ], [
      "name" => "Thomas Mycroft",
      "mail" => "tmycroft8@amazonaws.com",
      "address" => "6196 Schurz Parkway",
      "phone" => "8928455640",
      "birthDate" => "2019-04-01"
    ], [
      "name" => "Dylan Denley",
      "mail" => "ddenley9@spiegel.de",
      "address" => "2 Melrose Circle",
      "phone" => "2271561385",
      "birthDate" => "2018-09-10"
    ], [
      "name" => "FairleighIlyenko",
      "mail" => "filyenkoa@indiegogo.com",
      "address" => "0638 Warbler Center",
      "phone" => "1001348647",
      "birthDate" => "2018-08-29"
    ], [
      "name" => "Zeb Upcott",
      "mail" => "zupcottb@google.fr",
      "address" => "154 Kensington Alley",
      "phone" => "6608393722",
      "birthDate" => "2020-01-01"
    ], [
      "name" => "Elicia Erridge",
      "mail" => "eerridgec@cbsnews.com",
      "address" => "4304 Lakeland Circle",
      "phone" => "4029379762",
      "birthDate" => "2020-04-13"
    ], [
      "name" => "Jud Gossage",
      "mail" => "jgossaged@typepad.com",
      "address" => "4588 Killdeer Crossing",
      "phone" => "4168974891",
      "birthDate" => "2019-04-23"
    ], [
      "name" => "Baldwin Edeler",
      "mail" => "bedelere@nyu.edu",
      "address" => "01958 Cascade Lane",
      "phone" => "6295899416",
      "birthDate" => "2021-02-23"
    ], [
      "name" => "Carmela Janoschek",
      "mail" => "cjanoschekf@qq.com",
      "address" => "64773 Golf Course Pass",
      "phone" => "1794352955",
      "birthDate" => "2021-11-10"
    ], [
      "name" => "Ruthanne Simmig",
      "mail" => "rsimmigg@illinois.edu",
      "address" => "763 Messerschmidt Park",
      "phone" => "8263875479",
      "birthDate" => "2020-05-11"
    ], [
      "name" => "Alfonso",
      "last_name" => "Sherebrook",
      "mail" => "asherebrookh@ezinearticles.com",
      "address" => "38614 Duke Avenue",
      "phone" => "3173384970",
      "birthDate" => "2019-01-19"
    ], [
      "name" => "Russell McPeck",
      "mail" => "rmcpecki@comcast.net",
      "address" => "595 Lerdahl Point",
      "phone" => "6826985399",
      "birthDate" => "2022-02-16"
    ], [
      "name" => "Novelia Charnock",
      "mail" => "ncharnockj@webeden.co.uk",
      "address" => "60 Oak Valley Parkway",
      "phone" => "9495022897",
      "birthDate" => "2019-04-28"
    ], [
      "name" => "Donetta Crossingham",
      "mail" => "dcrossinghamk@rakuten.co.jp",
      "address" => "0447 Crownhardt Terrace",
      "phone" => "3528185382",
      "birthDate" => "2020-08-18"
    ], [
      "name" => "Skelly Kembery",
      "mail" => "skemberyl@google.cn",
      "address" => "25472 Thackeray Center",
      "phone" => "9976447777",
      "birthDate" => "2020-12-26"
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::USERS as  $key => $data) {
      $user = new Users();
      $user->setName($data['name']);
      $user->setMail($data['mail']);
      $user->setAddress($data['address']);
      $user->setPhone($data['phone']);
      $user->setBirthDate(new DateTime($data['birthDate']));
      $this->addReference('user_' . $key, $user);

      $manager->persist($user);
    }

    $manager->flush();
  }
}
// 