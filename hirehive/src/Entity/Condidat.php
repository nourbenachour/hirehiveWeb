<?php

namespace App\Entity;

use App\Repository\CondidatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CondidatRepository::class)]
#[ORM\Table(name: 'condidat')]
class Condidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id_condidat', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    private int $userId;

    #[ORM\Column(name: 'competances', type: 'text', nullable: true)]
    private ?string $competances = null;

    #[ORM\Column(name: 'experience', type: 'text', nullable: true)]
    private ?string $experience = null;

    #[ORM\Column(name: 'education', type: 'text', nullable: true)]
    private ?string $education = null;

    #[ORM\Column(name: 'bio', type: 'text', nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(name: 'photo', type: 'string', length: 500, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(name: 'cv', type: 'string', length: 500, nullable: true)]
    private ?string $cv = null;

    #[ORM\Column(name: 'formations', type: 'text', nullable: true)]
    private ?string $formations = null;

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

    public function getCompetances(): ?string
    {
        return $this->competances;
    }

    public function setCompetances(?string $competances): self
    {
        $this->competances = $competances;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(?string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(?string $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getFormations(): ?string
    {
        return $this->formations;
    }

    public function setFormations(?string $formations): self
    {
        $this->formations = $formations;

        return $this;
    }
}
