<?php

namespace App\Entity;

use App\Repository\CitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitiesRepository::class)]
class Cities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CityName = null;

    #[ORM\OneToMany(mappedBy: 'City', targetEntity: JobAnnouncements::class)]
    private Collection $jobAnnouncements;

    public function __construct()
    {
        $this->jobAnnouncements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->CityName;
    }

    public function setCityName(string $CityName): static
    {
        $this->CityName = $CityName;

        return $this;
    }

    /**
     * @return Collection<int, JobAnnouncements>
     */
    public function getJobAnnouncements(): Collection
    {
        return $this->jobAnnouncements;
    }

    public function addJobAnnouncement(JobAnnouncements $jobAnnouncement): static
    {
        if (!$this->jobAnnouncements->contains($jobAnnouncement)) {
            $this->jobAnnouncements->add($jobAnnouncement);
            $jobAnnouncement->setCity($this);
        }

        return $this;
    }

    public function removeJobAnnouncement(JobAnnouncements $jobAnnouncement): static
    {
        if ($this->jobAnnouncements->removeElement($jobAnnouncement)) {
            // set the owning side to null (unless already changed)
            if ($jobAnnouncement->getCity() === $this) {
                $jobAnnouncement->setCity(null);
            }
        }

        return $this;
    }
}
