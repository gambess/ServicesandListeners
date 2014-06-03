<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fractalia\Bundle\SMSBundle\Sms;

/**
 * Description of SMSManager
 *
 * @author Raziel Valle Miranda <raziel.valle@fractaliasoftware.com>
 */


class SMSManager
{
    private $msg;
    private $send;


    public function __construct($sender, $msg)
    {
        $this->send = $sender;
        $this->msg = $msg;
        
    }
   
    public function write()
    {
         return $this->send->escribe();
    }
}
