<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 *
 */



namespace Cli;

/**
 * Description of AppCommandSymfony
 *
 * @author nadir
 */
use \Symfony\Component\Console\Input\InputArgument ; 


class AppCommandSymfony extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {


	$this
		->setName('load_data')
		->setDescription("Example ./build.phar load_data 'Paris' 'London' 'en_GB' '45.1667|5.7167' '45.75|4.85' 'EUR' '10000' 'json' 7 14 '' 1 'desc' 10 'trip_price' 1" )
	        ->setHelp("example : ./build.phar load_data 'Paris' 'London' 'en_GB' '45.1667|5.7167' "
                        . "'45.75|4.85' 'EUR' '10000' 'json' 7 14 '' 1 'desc' 10 'trip_price' 1' ") ;
                
        ;
     
        
    }

    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {	

        phpinfo() ;        die() ; 
        $container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
        $loader = new \Symfony\Component\DependencyInjection\Loader\XmlFileLoader(
                $container, 
                new \Symfony\Component\Config\FileLocator(__DIR__."/../../conf/db/parameters.yml"));
                $loader->load(__DIR__.'/../../conf/services/services.xml');



	var_dump($loader) ; 
        
        
              

}


    

    
}
