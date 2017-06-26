<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of compile
 *
 * @author nadir
 */


require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;




class compile extends BaseApplication {
   
    
     public function getHelp()
    {
        $colors = new Cli\Colors();
        return  
        
        $colors->getColoredString('==============================================================================', "red", null ) . "\n".
        $colors->getColoredString("API BlaBla CAR DATA ", "cyan") .
        $colors->getColoredString('Version 1.0.0', "red", null ) . "\n" .         
       "\n". parent::getHelp()."\n".$colors->getColoredString('==============================================================================', "red", null ) . "\n" ; 
    }

}

$container = new ContainerBuilder();
$loader = new XmlFileLoader($container, new FileLocator(__DIR__."/../conf"));
$loader->load('services/services.xml');

$application = new compile() ; 
$application->add(new \Cli\AppCommandSymfony() );
$application->run();