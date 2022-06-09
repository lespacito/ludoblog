<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var string|null
     * @ORM\Column(unique=true)
     */
    private ?string $email = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    private ?string $password = null;

    /**
     * @var string|null
     * @ORM\Column(unique=true)
     */
    private ?string $pseudo = null;

    /**
     * @var DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     */
    private DateTimeImmutable $registeredAt;

    /**
     * User Constructor
     * @throws \Exception
     */
    public function __construct()
    {
        $this->registeredAt = new GlobalDateTimeImmutable();   
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getRegisteredAt(): DateTimeImmutable
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(DateTimeImmutable $registeredAt): void
    {
        $this->registeredAt = $registeredAt;
    }

    public function getRoles()
    {
        return ["ROLE_USER"];
    }

    public function getSalt()
    {
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
    }
}
