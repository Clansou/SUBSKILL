<?php

namespace App\Entity;

use App\Repository\ContractsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractsRepository::class)]
class Contracts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ContractName = null;

    #[ORM\OneToMany(mappedBy: 'Contract', targetEntity: JobAnnouncements::class)]
    private Collection $jobAnnouncements;

    public function __construct()
    {
        $this->jobAnnouncements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractName(): ?string
    {
        return $this->ContractName;
    }

    public function setContractName(string $ContractName): static
    {
        $this->ContractName = $ContractName;

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
            $jobAnnouncement->setContract($this);
        }

        return $this;
    }

    public function removeJobAnnouncement(JobAnnouncements $jobAnnouncement): static
    {
        if ($this->jobAnnouncements->removeElement($jobAnnouncement)) {
            // set the owning side to null (unless already changed)
            if ($jobAnnouncement->getContract() === $this) {
                $jobAnnouncement->setContract(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getContractName();
    }
}
