<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 */
class Usuarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nombreUsuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Tareas::class, mappedBy="idUsuario", orphanRemoval=true)
     */
    private $idTarea;

    public function __construct()
    {
        $this->idTarea = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreUsuario(): ?string
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario(string $nombreUsuario): self
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Tareas[]
     */
    public function getIdTarea(): Collection
    {
        return $this->idTarea;
    }

    public function addIdTarea(Tareas $idTarea): self
    {
        if (!$this->idTarea->contains($idTarea)) {
            $this->idTarea[] = $idTarea;
            $idTarea->setIdUsuario($this);
        }

        return $this;
    }

    public function removeIdTarea(Tareas $idTarea): self
    {
        if ($this->idTarea->removeElement($idTarea)) {
            // set the owning side to null (unless already changed)
            if ($idTarea->getIdUsuario() === $this) {
                $idTarea->setIdUsuario(null);
            }
        }

        return $this;
    }

    public function __toString(): string{

        return $this->nombre_usuario;
    }

}
