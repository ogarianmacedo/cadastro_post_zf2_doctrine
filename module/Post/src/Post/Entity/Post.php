<?php

namespace Post\Entity;

use Autor\Entity\Autor;
use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Post\Entity\PostRepository")
 */
class Post extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", nullable=false)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo = '0';

    /**
     * @var \Categoria\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria\Entity\Categoria")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoriaId;

    /**
     * @var \Autor\Entity\Autor
     *
     * @ORM\ManyToOne(targetEntity="Autor\Entity\Autor")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     * })
     */
    private $autorId;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Post
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Post
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @ORM\PrePersist
     *
     * @return Post
     */
    public function setCreated()
    {
        $this->created = new \DateTime('now');

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @ORM\PreUpdate
     *
     * @return Post
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime('now');

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Post
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set categoriaId
     *
     * @param \Categoria\Entity\Categoria $categoriaId
     *
     * @return Post
     */
    public function setCategoriaId(\Categoria\Entity\Categoria $categoriaId = null)
    {
        $this->categoriaId = $categoriaId;

        return $this;
    }

    /**
     * Get categoriaId
     *
     * @return \Categoria\Entity\Categoria
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * Set autorId
     *
     * @param \Autor\Entity\Autor $autorId
     *
     * @return Post
     */
    public function setAutorId(\Autor\Entity\Autor $autorId = null)
    {
        $this->autorId = $autorId;

        return $this;
    }

    /**
     * Get autorId
     *
     * @return \Autor\Entity\Autor
     */
    public function getAutorId()
    {
        return $this->autorId;
    }
}
