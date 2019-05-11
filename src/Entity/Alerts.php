<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alerts
 *
 * @ORM\Table(name="alerts")
 * @ORM\Entity
 */
class Alerts
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
     * @ORM\Column(name="hash", type="string", length=50, nullable=true)
     */
    private $hash;

    /**
     * @var string|null
     *
     * @ORM\Column(name="group_user", type="string", length=30, nullable=true)
     */
    private $groupUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user", type="string", length=30, nullable=true)
     */
    private $user;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keyword", type="string", length=30, nullable=true)
     */
    private $keyword;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="reglement", type="string", length=30, nullable=true)
     */
    private $reglement;

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
     * @ORM\Column(name="contact_responsable", type="string", length=30, nullable=true)
     */
    private $contactResponsable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=30, nullable=false, options={"default"="Admin"})
     */
    private $createdBy = 'Admin';

    /**
     * @var string
     *
     * @ORM\Column(name="updated_by", type="string", length=30, nullable=false, options={"default"="Admin"})
     */
    private $updatedBy = 'Admin';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getGroupUser(): ?string
    {
        return $this->groupUser;
    }

    public function setGroupUser(?string $groupUser): self
    {
        $this->groupUser = $groupUser;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getReglement(): ?string
    {
        return $this->reglement;
    }

    public function setReglement(?string $reglement): self
    {
        $this->reglement = $reglement;

        return $this;
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

    public function getContactResponsable(): ?string
    {
        return $this->contactResponsable;
    }

    public function setContactResponsable(?string $contactResponsable): self
    {
        $this->contactResponsable = $contactResponsable;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTimeInterface $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTimeInterface $lastUpdate): self
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

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(string $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }


}
