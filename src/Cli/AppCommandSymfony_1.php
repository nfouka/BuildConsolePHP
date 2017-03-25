<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Cli;

/**
 * Description of AppCommandSymfony
 *
 * @author nadir
 */



class AppCommandSymfony_1 extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {

	$this
			->setName('update')
			->setDescription('Updates your dependencies to the latest version according to composer.json, and updates the composer.lock file.')
			->setHelp('This command allows you to create a user...')
    ;
       
        
    }


    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
      
    }
    
}
