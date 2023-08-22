<?php

namespace App\Entity;

use App\Repository\ContractsRepository;
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
}
