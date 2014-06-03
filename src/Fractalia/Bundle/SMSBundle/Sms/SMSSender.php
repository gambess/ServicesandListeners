<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fractalia\Bundle\SMSBundle\Sms;

/**
 * Description of SMSSender
 *
 * @author Raziel Valle Miranda <raziel.valle@fractaliasoftware.com>
 */


class SMSSender
{
    private $api =array();
//    private $client;
    
    
    
    public function __construct($configApi)
    {
        $this->api = $configApi;
    }
    
    public function escribe(){
        return $this->api;
    }
    
    public function send()
    {
        
    }
}
