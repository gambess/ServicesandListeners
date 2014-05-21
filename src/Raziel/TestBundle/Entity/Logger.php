<?php

namespace Raziel\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logger
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Raziel\TestBundle\Entity\LoggerRepository")
 */
class Logger
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="errorTrace", type="string", length=255)
     */
    private $errorTrace;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEnvio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEnvioErroneo", type="datetime")
     */
    private $fechaEnvioErroneo;


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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Logger
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
     * Set errorTrace
     *
     * @param string $errorTrace
     * @return Logger
     */
    public function setErrorTrace($errorTrace)
    {
        $this->errorTrace = $errorTrace;

        return $this;
    }

    /**
     * Get errorTrace
     *
     * @return string 
     */
    public function getErrorTrace()
    {
        return $this->errorTrace;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Logger
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
     * Set fechaEnvioErroneo
     *
     * @param \DateTime $fechaEnvioErroneo
     * @return Logger
     */
    public function setFechaEnvioErroneo($fechaEnvioErroneo)
    {
        $this->fechaEnvioErroneo = $fechaEnvioErroneo;

        return $this;
    }

    /**
     * Get fechaEnvioErroneo
     *
     * @return \DateTime 
     */
    public function getFechaEnvioErroneo()
    {
        return $this->fechaEnvioErroneo;
    }
}
