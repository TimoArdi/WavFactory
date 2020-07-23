<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const ADMIN = [
        'yaxaprod@gmail.com' => [
            'role' => 'ROLE_ADMIN',
        ],
        'loubinksbeats@gmail.com' =>[
            'role' => 'ROLE_ADMIN',
        ],
        '6ambeatmaking@gmail.com' =>[
            'role' => 'ROLE_ADMIN',
        ],
        'globesaucer@gmail.com' =>[
            'role' => 'ROLE_ADMIN',
        ],

    ];
    const PASSWORD_TEST = 'WavFactory33#';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::ADMIN as $key => $admin) {
            $user = new User();
            $user->setEmail($key);
            $user->setRoles([$admin['role']]);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                self::PASSWORD_TEST
            ));
            $manager->persist($user);
        }
        $manager->flush();
    }
}
