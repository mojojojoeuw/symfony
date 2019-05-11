<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement")
 * @ApiResource
 * @ORM\Entity
 */
class Reglement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="group_responsable", type="string", length=30, nullable=true)
     */
    private $groupResponsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="responsable", type="string", length=30, nullable=true)
     */
    private $responsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_address", type="string", length=30, nullable=true)
     */
    private $emailAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sip_number", type="string", length=30, nullable=true)
     */
    private $sipNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime")
     */
    private $lastUpdate ;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=30, nullable=false, options={"default"="Admin"})
     */
    private $createdBy = 'Admin';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupResponsable(): ?string
    {
        return $this->groupResponsable;
    }

    public function setGroupResponsable(?string $groupResponsable): self
    {
        $this->groupResponsable = $groupResponsable;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getSipNumber(): ?string
    {
        return $this->sipNumber;
    }

    public function setSipNumber(?string $sipNumber): self
    {
        $this->sipNumber = $sipNumber;

        return $this;
    }

    public function getCreateDate(): ?\DateTime
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTime $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getLastUpdate(): ?\DateTime
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTime $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }


}
