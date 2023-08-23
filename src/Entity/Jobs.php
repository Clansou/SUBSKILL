<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobsRepository::class)]
class Jobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $JobName = null;

    #[ORM\OneToMany(mappedBy: 'Job', targetEntity: JobAnnouncements::class)]
    private Collection $jobAnnouncements;

    public function __construct()
    {
        $this->jobAnnouncements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobName(): ?string
    {
        return $this->JobName;
    }

    public function setJobName(string $JobName): static
    {
        $this->JobName = $JobName;

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
            $jobAnnouncement->setJob($this);
        }

        return $this;
    }

    public function removeJobAnnouncement(JobAnnouncements $jobAnnouncement): static
    {
        if ($this->jobAnnouncements->removeElement($jobAnnouncement)) {
            // set the owning side to null (unless already changed)
            if ($jobAnnouncement->getJob() === $this) {
                $jobAnnouncement->setJob(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getJobName();
    }
    
}
