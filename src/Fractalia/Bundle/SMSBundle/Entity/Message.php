<?php

namespace Fractalia\Bundle\SMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fractalia\Bundle\SMSBundle\Entity\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="templateId", type="integer")
     */
    private $templateId;

    /**
     * @var integer
     *
     * @ORM\Column(name="incidenciaId", type="integer")
     */
    private $incidenciaId;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=255)
     */
    private $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="tecnico", type="string", length=255)
     */
    private $tecnico;

    /**
     * @var string
     *
     * @ORM\Column(name="tsol", type="string", length=255)
     */
    private $tsol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="modoRecepcion", type="string", length=255)
     */
    private $modoRecepcion;

    /**
     * @var string
     *
     * @ORM\Column(name="resoluciones", type="string", length=255)
     */
    private $resoluciones;


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
     * Set templateId
     *
     * @param integer $templateId
     * @return Message
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Get templateId
     *
     * @return integer 
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Set incidenciaId
     *
     * @param integer $incidenciaId
     * @return Message
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
     * Set estado
     *
     * @param string $estado
     * @return Message
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
     * Set cliente
     *
     * @param string $cliente
     * @return Message
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Message
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set tecnico
     *
     * @param string $tecnico
     * @return Message
     */
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get tecnico
     *
     * @return string 
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set tsol
     *
     * @param string $tsol
     * @return Message
     */
    public function setTsol($tsol)
    {
        $this->tsol = $tsol;

        return $this;
    }

    /**
     * Get tsol
     *
     * @return string 
     */
    public function getTsol()
    {
        return $this->tsol;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Message
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set modoRecepcion
     *
     * @param string $modoRecepcion
     * @return Message
     */
    public function setModoRecepcion($modoRecepcion)
    {
        $this->modoRecepcion = $modoRecepcion;

        return $this;
    }

    /**
     * Get modoRecepcion
     *
     * @return string 
     */
    public function getModoRecepcion()
    {
        return $this->modoRecepcion;
    }

    /**
     * Set resoluciones
     *
     * @param string $resoluciones
     * @return Message
     */
    public function setResoluciones($resoluciones)
    {
        $this->resoluciones = $resoluciones;

        return $this;
    }

    /**
     * Get resoluciones
     *
     * @return string 
     */
    public function getResoluciones()
    {
        return $this->resoluciones;
    }
}
