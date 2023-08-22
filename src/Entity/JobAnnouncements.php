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
}
