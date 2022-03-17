<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class UsersFixtures extends Fixture
{
    const USERS = [
        [
            
            'name' => 'Oluyemi',
            'firstname' => 'Olususi ',
            'mail' => 'email@email.com',
            'adress' => 'adresse 1',
            'phonenumber' => '0212154896',
        ],
        [
            
            'name' => ' Terry',
            'firstname' => 'Camila ',          
            'mail' => 'email@email.com',
            'adress' => 'adresse 2',
            'phonenumber' => '1256987412',
        ],
        [
            
            'name' => ' Williamson',
            'firstname' => 'Joel ',
            'mail' => 'email@email.com',
            'adress' => 'adresse 3',
            'phonenumber' => '032845123',
        ],
        [
            
            'name' => ' Payne',
            'firstname' => 'Deann ',         
            'mail' => 'email@email.com',
            'adress' => 'adresse 4',
            'phonenumber' => '0325846185',
        ],
        [
            
            'name' => ' Perkins',
            'firstname' => 'Donald ',            
            'mail' => 'email@email.com',
            'adress' => 'adresse 5',
            'phonenumber' => '0329841269',
        ]
    ];

    public function load(ObjectManager $manager)
    {
        
        foreach (self::USERS as $data) {
            $user = (new Users())
                ->setName($data['name'])
                ->setFirstname($data['firstname'])
                ->setMail($data['mail'])
                ->setAdress($data['adress'])
                ->setPhonenumber($data['phonenumber'])
            ;
            $manager->persist($user);
        }

        $manager->flush();
    }
}
