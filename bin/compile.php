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


            $test1 = "test" ;
        $test2 = "test" ;
        $test3 = "test" ;


        $array = array('premier' => 'N° 1', 'deuxieme' => 'N° 2', 'troisieme' => 'N° 3');

        foreach ($array as $key => $value)
            echo 'Cet élément a pour clé "' . $key . '" et pour valeur "' . $value . '"<br />';





        $colors->getColoredString('==============================================================================', "red", null ) . "\n".
        $colors->getColoredString(""
                . ""
                . " 
    ____  __      ____  __         ___    ____  ____
   / __ )/ /___ _/ __ )/ /___ _   /   |  / __ \/  _/
  / __  / / __ `/ __  / / __ `/  / /| | / /_/ // /  
 / /_/ / / /_/ / /_/ / / /_/ /  / ___ |/ ____// /   
/_____/_/\__,_/_____/_/\__,_/  /_/  |_/_/   /___/   
                                                    
   _____________   ____________  ___  __________  ____ 
  / ____/ ____/ | / / ____/ __ \/   |/_  __/ __ \/ __ \
 / / __/ __/ /  |/ / __/ / /_/ / /| | / / / / / / /_/ /
/ /_/ / /___/ /|  / /___/ _, _/ ___ |/ / / /_/ / _, _/ 
\____/_____/_/ |_/_____/_/ |_/_/  |_/_/  \____/_/ |_|  
                                                                                
"
                . "", "cyan") .
        $colors->getColoredString('Author : nadir.fouka@univ-grenoble-alpes.fr', "green", "black" ) . "\n" .         
       "\n". parent::getHelp()."\n".$colors->getColoredString('==============================================================================', "red", null ) . "\n" ; 
    }

}
$array = array( 'premier' => 'N° 1', 'deuxieme' => 'N° 2', 'troisieme' => 'N° 3');
$container = new ContainerBuilder();
$loader = new XmlFileLoader($container, new FileLocator(__DIR__."/../conf"));
$loader->load('services/services.xml');

$application = new compile() ; 
$application->add(new \Cli\AppCommandSymfony() );
$application->run();

