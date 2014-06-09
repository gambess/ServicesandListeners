<?php

namespace Raziel\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensaje
 *
 * @ORM\Table(name="mensaje", indexes={@ORM\Index(name="fk_mensaje_plantilla", columns={"plantilla_id"})})
 * @ORM\Entity(repositoryClass="Pi2\Fractalia\SmsBundle\Entity\MensajeRepository")
 */
class Mensaje
{
    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", nullable=true)
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="bitacora", type="text", nullable=false)
     */
    private $bitacora;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizacion", type="datetime", nullable=false)
     */
    private $fechaActualizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Raziel\TestBundle\Entity\Plantilla
     *
     * @ORM\ManyToOne(targetEntity="Raziel\TestBundle\Entity\Plantilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plantilla_id", referencedColumnName="id")
     * })
     */
    private $plantilla;



    /**
     * Set texto
     *
     * @param string $texto
     * @return Mensaje
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
     * Set estado
     *
     * @param string $estado
     * @return Mensaje
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set bitacora
     *
     * @param string $bitacora
     * @return Mensaje
     */
    public function setBitacora($bitacora)
    {
        $this->bitacora = $bitacora;

        return $this;
    }

    /**
     * Get bitacora
     *
     * @return string 
     */
    public function getBitacora()
    {
        return $this->bitacora;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Mensaje
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     * @return Mensaje
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Get fechaActualizacion
     *
     * @return \DateTime 
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

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
     * Set plantilla
     *
     * @param \Raziel\TestBundle\Entity\Plantilla $plantilla
     * @return Mensaje
     */
    public function setPlantilla(\Raziel\TestBundle\Entity\Plantilla $plantilla = null)
    {
        $this->plantilla = $plantilla;

        return $this;
    }

    /**
     * Get plantilla
     *
     * @return \Raziel\TestBundle\Entity\Plantilla 
     */
    public function getPlantilla()
    {
        return $this->plantilla;
    }
}
