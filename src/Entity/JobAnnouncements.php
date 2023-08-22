<?php

namespace App\Entity;

use App\Repository\JobAnnouncementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobAnnouncementsRepository::class)]
class JobAnnouncements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $PublishDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $LastUpdateDate = null;

    #[ORM\Column(length: 255)]
    private ?string $AnnouncementsTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'jobAnnouncements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cities $City = null;

    #[ORM\ManyToOne(inversedBy: 'jobAnnouncements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Companies $Company = null;

    #[ORM\ManyToOne(inversedBy: 'jobAnnouncements')]
    private ?Contracts $Contract = null;

    #[ORM\ManyToOne(inversedBy: 'jobAnnouncements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Jobs $Job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->PublishDate;
    }

    public function setPublishDate(\DateTimeInterface $PublishDate): static
    {
        $this->PublishDate = $PublishDate;

        return $this;
    }

    public function getLastUpdateDate(): ?\DateTimeInterface
    {
        return $this->LastUpdateDate;
    }

    public function setLastUpdateDate(\DateTimeInterface $LastUpdateDate): static
    {
        $this->LastUpdateDate = $LastUpdateDate;

        return $this;
    }

    public function getAnnouncementsTitle(): ?string
    {
        return $this->AnnouncementsTitle;
    }

    public function setAnnouncementsTitle(string $AnnouncementsTitle): static
    {
        $this->AnnouncementsTitle = $AnnouncementsTitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCity(): ?Cities
    {
        return $this->City;
    }

    public function setCity(?Cities $City): static
    {
        $this->City = $City;

        return $this;
    }

    public function getCompany(): ?Companies
    {
        return $this->Company;
    }

    public function setCompany(?Companies $Company): static
    {
        $this->Company = $Company;

        return $this;
    }

    public function getContract(): ?Contracts
    {
        return $this->Contract;
    }

    public function setContract(?Contracts $Contract): static
    {
        $this->Contract = $Contract;

        return $this;
    }

    public function getJob(): ?Jobs
    {
        return $this->Job;
    }

    public function setJob(?Jobs $Job): static
    {
        $this->Job = $Job;

        return $this;
    }
}
