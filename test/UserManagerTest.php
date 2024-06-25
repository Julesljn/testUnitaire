<?php

declare(strict_types=1);

require 'src/config/config.php';

use PHPUnit\Framework\TestCase;
use App\Models\UserManager;
use App\Models\User;

final class UserManagerTest extends TestCase
{
    private ?UserManager $userManager = null;
    private ?PDO $pdo = null;

    protected function setUp(): void
    {
        parent::setUp();

        // Initialiser UserManager
        $this->userManager = new UserManager();
    }

    public function testAddUser(): void
    {
        $lastName = 'Doe';
        $firstName = 'John';
        $email = 'john.doe@example.com';
        $password = 'testpassword';
        $gender = 'male';
        $birthDate = '1990-01-01';
        $userRole = 'user';

        // Créer un objet User
        $user = new User();
        $user->setLastName($lastName);
        $user->setFirstName($firstName);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setGender($gender);
        $user->setBirthDate($birthDate);
        $user->setUserRole($userRole);

        // Appeler la méthode addUser
        $createdUser = $this->userManager->addUser($user);

        // Vérifier que l'utilisateur créé a un ID positif
        $this->assertNotNull($createdUser->getId());
        $this->assertGreaterThan(0, $createdUser->getId());
    }

    public function testLoginStore(): void
    {
        $lastName = 'Doe';
        $firstName = 'John';
        $email = 'john.doe@example.com';
        $password = 'testpassword';
        $gender = 'male';
        $birthDate = '1990-01-01';
        $userRole = 'user';

        // Créer un objet User
        $user = new User();
        $user->setLastName($lastName);
        $user->setFirstName($firstName);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setGender($gender);
        $user->setBirthDate($birthDate);
        $user->setUserRole($userRole);

        // Appeler la méthode addUser pour s'assurer que l'utilisateur existe
        $this->userManager->addUser($user);

        // Créer un nouvel objet User pour la connexion
        $loginUser = new User();
        $loginUser->setEmail($email);
        $loginUser->setPassword($password);

        // Appeler la méthode loginStore
        $loggedInUser = $this->userManager->loginStore($loginUser);

        // Vérifier que l'utilisateur retourné n'est pas null
        $this->assertInstanceOf(User::class, $loggedInUser);
        $this->assertEquals($email, $loggedInUser->getEmail());
    }
}
