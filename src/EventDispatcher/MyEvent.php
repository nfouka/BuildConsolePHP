<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace EventDispatcher;
use \Symfony\Component\EventDispatcher\Event ; 

/**
 * Description of MyEvent
 *
 * @author nadir
 */
class MyEvent extends  Event  {
    
    //put your code here
        const NAME = 'myEvenet.dispatcher';
        private $name ; 
        private $adress ; 
        function __construct($name, $adress) {
            $this->name = $name;
            $this->adress = $adress;
        }

        function getName() {
            return $this->name;
        }

        function getAdress() {
            return $this->adress;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setAdress($adress) {
            $this->adress = $adress;
        }


}
