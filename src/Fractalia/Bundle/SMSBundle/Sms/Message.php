<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fractalia\Bundle\SMSBundle\Sms;

use \Raziel\TestBundle\Entity\Incidencia;

/**
 * Description of Message
 *
 * @author Raziel Valle Miranda <raziel.valle@fractaliasoftware.com>
 */
class Message
{
    private $incidencia_base;

    public function __construct(Incidencia $i)
    {

        $this->incidencia_base = $i;
    }

    //put your code here
}
