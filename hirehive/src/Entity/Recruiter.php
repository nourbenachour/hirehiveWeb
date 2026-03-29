<?php

namespace App\Entity;

use App\Repository\RecruiterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecruiterRepository::class)]
#[ORM\Table(name: 'recruiter')]
class Recruiter
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id_recruiter', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    private int $userId;

    #[ORM\Column(name: 'company_id', type: 'integer', nullable: true)]
    private ?int $companyId = null;

    #[ORM\Column(name: 'company_name', type: 'string', length: 255, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(name: 'company_logo', type: 'string', length: 500, nullable: true)]
    private ?string $companyLogo = null;

    #[ORM\Column(name: 'company_bio', type: 'text', nullable: true)]
    private ?string $companyBio = null;

    #[ORM\Column(name: 'company_website', type: 'string', length: 255, nullable: true)]
    private ?string $companyWebsite = null;

    #[ORM\Column(name: 'secteur_activite', type: 'string', length: 150)]
    private string $secteurActivite;

    #[ORM\Column(name: 'email_contact_entreprise', type: 'string', length: 150)]
    private string $emailContactEntreprise;

    #[ORM\Column(name: 'telephone_service_client', type: 'string', length: 20)]
    private string $telephoneServiceClient;

    #[ORM\Column(name: 'salaires', type: 'integer')]
    private int $salaires;

    #[ORM\Column(name: 'adresse', type: 'string', length: 150, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(name: 'position', type: 'string', length: 150, nullable: true)]
    private ?string $position = null;

    #[ORM\Column(name: 'permission', type: 'string', length: 20, nullable: true)]
    private ?string $permission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    public function setCompanyId(?int $companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyLogo(): ?string
    {
        return $this->companyLogo;
    }

    public function setCompanyLogo(?string $companyLogo): self
    {
        $this->companyLogo = $companyLogo;

        return $this;
    }

    public function getCompanyBio(): ?string
    {
        return $this->companyBio;
    }

    public function setCompanyBio(?string $companyBio): self
    {
        $this->companyBio = $companyBio;

        return $this;
    }

    public function getCompanyWebsite(): ?string
    {
        return $this->companyWebsite;
    }

    public function setCompanyWebsite(?string $companyWebsite): self
    {
        $this->companyWebsite = $companyWebsite;

        return $this;
    }

    public function getSecteurActivite(): string
    {
        return $this->secteurActivite;
    }

    public function setSecteurActivite(string $secteurActivite): self
    {
        $this->secteurActivite = $secteurActivite;

        return $this;
    }

    public function getEmailContactEntreprise(): string
    {
        return $this->emailContactEntreprise;
    }

    public function setEmailContactEntreprise(string $emailContactEntreprise): self
    {
        $this->emailContactEntreprise = $emailContactEntreprise;

        return $this;
    }

    public function getTelephoneServiceClient(): string
    {
        return $this->telephoneServiceClient;
    }

    public function setTelephoneServiceClient(string $telephoneServiceClient): self
    {
        $this->telephoneServiceClient = $telephoneServiceClient;

        return $this;
    }

    public function getSalaires(): int
    {
        return $this->salaires;
    }

    public function setSalaires(int $salaires): self
    {
        $this->salaires = $salaires;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }
}
