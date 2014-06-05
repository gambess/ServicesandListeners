<?php

namespace Fractalia\Bundle\SMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensaje
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fractalia\Bundle\SMSBundle\Entity\MensajeRepository")
 */
class Mensaje
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
     * @var integer
     *
     * @ORM\Column(name="IncidenciaId", type="integer")
     */
    private $incidenciaId;

    /**
     * @var string
     *
     * @ORM\Column(name="TemplateName", type="string", length=50)
     */
    private $templateName;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text")
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="Estado", type="string", length=15)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaConstruccion", type="datetime")
     */
    private $fechaConstruccion;

    /**
     * @var string
     *
     * @ORM\Column(name="LogMensaje", type="text")
     */
    private $logMensaje;


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
     * Set incidenciaId
     *
     * @param integer $incidenciaId
     * @return Mensaje
     */
    public function setIncidenciaId($incidenciaId)
    {
        $this->incidenciaId = $incidenciaId;

        return $this;
    }

    /**
     * Get incidenciaId
     *
     * @return integer 
     */
    public function getIncidenciaId()
    {
        return $this->incidenciaId;
    }

    /**
     * Set templateName
     *
     * @param string $templateName
     * @return Mensaje
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * Get templateName
     *
     * @return string 
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

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
     * Set fechaConstruccion
     *
     * @param \DateTime $fechaConstruccion
     * @return Mensaje
     */
    public function setFechaConstruccion($fechaConstruccion)
    {
        $this->fechaConstruccion = $fechaConstruccion;

        return $this;
    }

    /**
     * Get fechaConstruccion
     *
     * @return \DateTime 
     */
    public function getFechaConstruccion()
    {
        return $this->fechaConstruccion;
    }

    /**
     * Set logMensaje
     *
     * @param string $logMensaje
     * @return Mensaje
     */
    public function setLogMensaje($logMensaje)
    {
        $this->logMensaje = $logMensaje;

        return $this;
    }

    /**
     * Get logMensaje
     *
     * @return string 
     */
    public function getLogMensaje()
    {
        return $this->logMensaje;
    }
}
