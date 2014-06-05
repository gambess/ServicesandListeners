<?php

namespace Fractalia\Bundle\SMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SMS
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fractalia\Bundle\SMSBundle\Entity\SMSRepository")
 */
class SMS
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
     * @ORM\Column(name="mensajeId", type="integer")
     */
    private $mensajeId;

    /**
     * @var string
     *
     * @ORM\Column(name="destinatario", type="string", length=100)
     */
    private $destinatario;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=100)
     */
    private $remitente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEnvio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoEnvio", type="string", length=15)
     */
    private $estadoEnvio;


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
     * Set mensajeId
     *
     * @param integer $mensajeId
     * @return SMS
     */
    public function setMensajeId($mensajeId)
    {
        $this->mensajeId = $mensajeId;

        return $this;
    }

    /**
     * Get mensajeId
     *
     * @return integer 
     */
    public function getMensajeId()
    {
        return $this->mensajeId;
    }

    /**
     * Set destinatario
     *
     * @param string $destinatario
     * @return SMS
     */
    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return string 
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set remitente
     *
     * @param string $remitente
     * @return SMS
     */
    public function setRemitente($remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return string 
     */
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return SMS
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
     * Set estadoEnvio
     *
     * @param string $estadoEnvio
     * @return SMS
     */
    public function setEstadoEnvio($estadoEnvio)
    {
        $this->estadoEnvio = $estadoEnvio;

        return $this;
    }

    /**
     * Get estadoEnvio
     *
     * @return string 
     */
    public function getEstadoEnvio()
    {
        return $this->estadoEnvio;
    }
}
