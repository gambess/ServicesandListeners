<?php

/*
 * Clase de prueba para implementar un servidor xmlrpc
 */

/**
 * Description of MensajeriaNegocios
 *
 * @author Raziel Valle Miranda <raziel.valle@fractaliasoftware.com>
 */

namespace Raziel\TestBundle\Util;

class MensajeriaNegocios
{
    private $_user = "B902CCDB-RAUL.MADR";
    private $_password = "Nivel1";

    public function info($name)
    {
        return 1;
//            "Hola {$name}: "
//            . "Los Métodos Disponibles en este servidor RPC son:"
//            . "sms.enviarSMS, "
//            . "sms.enviarAGrupoContacto, "
//            . "sms.agregarGrupoContactos, "
//            . "sms.agregarContactoaGrupoContactos, y "
//            . "sms.agregarContactoaGrupoContactos";
    }

    public function enviarSMS($user, $password)
    {
        try
        {
            if (!$this->login($user, $password))
            {
                throw new Exception('Failed to login: your credentials are bad for user [' . $user . ']');
            }
            else
            {
                return 1;
            }
        }
        catch (Exception $e)
        {
            echo 'Excepción capturada EN ENVIAR SMS: ', $e->getMessage(), "\n";
        }
    }

    public function enviarAGrupoContacto()
    {
        
    }

    public function agregarGrupoContactos()
    {
        
    }

    public function agregarContactoaGrupoContactos()
    {
        
    }

    public function obtenerNumeroContactosdeGrupoContactos()
    {
        
    }

    private function login($user, $pass)
    {

        try
        {
            if ($this->_user == $user and $this->_password == $pass)
            {
                return true;
            }
        }
        catch (Exception $e)
        {
            echo 'Excepción capturada EN LOGIN: ', $e->getMessage(), "\n";
        }
    }


}
