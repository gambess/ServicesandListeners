<?php

namespace Raziel\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incidencia
 *
 * @ORM\Table()
 * @ORM\EntityListeners({ "Raziel\TestBundle\Listener\IncidenciaListener" })
 * @ORM\Entity(repositoryClass="Raziel\TestBundle\Entity\IncidenciaRepository")
 */
class Incidencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInsercion", type="datetime")
     */
    private $fechaInsercion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaLectura", type="datetime")
     */
    private $fechaLectura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEnvio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaLog", type="datetime")
     */
    private $fechaLog;


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
     * Set estado
     *
     * @param string $estado
     * @return Incidencia
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
     * Set fechaInsercion
     *
     * @param \DateTime $fechaInsercion
     * @return Incidencia
     */
    public function setFechaInsercion($fechaInsercion)
    {
        $this->fechaInsercion = $fechaInsercion;

        return $this;
    }

    /**
     * Get fechaInsercion
     *
     * @return \DateTime 
     */
    public function getFechaInsercion()
    {
        return $this->fechaInsercion;
    }

    /**
     * Set fechaLectura
     *
     * @param \DateTime $fechaLectura
     * @return Incidencia
     */
    public function setFechaLectura($fechaLectura)
    {
        $this->fechaLectura = $fechaLectura;

        return $this;
    }

    /**
     * Get fechaLectura
     *
     * @return \DateTime 
     */
    public function getFechaLectura()
    {
        return $this->fechaLectura;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Incidencia
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime 
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set fechaLog
     *
     * @param \DateTime $fechaLog
     * @return Incidencia
     */
    public function setFechaLog($fechaLog)
    {
        $this->fechaLog = $fechaLog;

        return $this;
    }

    /**
     * Get fechaLog
     *
     * @return \DateTime 
     */
    public function getFechaLog()
    {
        return $this->fechaLog;
    }
}
