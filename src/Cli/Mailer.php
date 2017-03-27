<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cli;

/**
 * Description of Mailer
 *
 * @author nadir
 */


class Mailer
{
    private $transport;

    public function __construct(MailerInjection $mailer)
    {
        $this->transport = $mailer ; 
        print $this->transport ; 
    }
    
    

}

