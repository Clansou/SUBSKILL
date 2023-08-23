<?php

namespace App\Entity;

use App\Repository\CompaniesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompaniesRepository::class)]
class Companies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CompanyName = null;

    #[ORM\OneToMany(mappedBy: 'Company', targetEntity: JobAnnouncements::class)]
    private Collection $jobAnnouncements;

    public function __construct()
    {
        $this->jobAnnouncements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->CompanyName;
    }

    public function setCompanyName(string $CompanyName): static
    {
        $this->CompanyName = $CompanyName;

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
            $jobAnnouncement->setCompany($this);
        }

        return $this;
    }

    public function removeJobAnnouncement(JobAnnouncements $jobAnnouncement): static
    {
        if ($this->jobAnnouncements->removeElement($jobAnnouncement)) {
            // set the owning side to null (unless already changed)
            if ($jobAnnouncement->getCompany() === $this) {
                $jobAnnouncement->setCompany(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getCompanyName();
    }
}
