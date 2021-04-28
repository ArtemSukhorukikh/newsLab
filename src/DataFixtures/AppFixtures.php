<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('admin@test.com');
        $admin->setName('Artem');
        $admin->setSurname('Sukhorukikh');
        $admin->setMiddleName('Olegovich');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'admin'
        ));
        $admin->setRoles(['ROLE_ADMIN']);
        $user = new User();
        $user->setEmail('test@test.com');
        $user->setName('Artem');
        $user->setSurname('Sukhorukikh');
        $user->setMiddleName('Olegovich');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'user123'
        ));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
