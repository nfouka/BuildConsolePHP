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



class AppCommandSymfony extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {


	$this
			->setName('load_data')
			->setDescription('Loading all data from database Mysql LAMP')
			->setHelp('This command allows you to create a user...')
    ;
     
        
    }

    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {		
        

		 $table = new \Symfony\Component\Console\Helper\Table($output);
			$table
			    ->setHeaders(array('ISBN', 'Title', 'Author'))
			    ->setRows(array(
				array('99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'),
				array('9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'),
				array('960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'),
				array('80-902734-1-6', 'And Then There Were None', 'Agatha Christie'),
			    ))
			;
		

		$table->setRows(array(
		    array('99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'),
		    array('9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'),
		    new \Symfony\Component\Console\Helper\TableSeparator(),
		    array('960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'),
		    array('80-902734-1-6', 'And Then There Were None', 'Agatha Christie'),
		));

	// by default, this is based on the default style
$style = new \Symfony\Component\Console\Helper\TableStyle();

// customize the style
$style
    ->setHorizontalBorderChar('<fg=magenta>|</>')
    ->setVerticalBorderChar('<fg=magenta>-</>')
    ->setCrossingChar(' ')
;

// use the style for this table
$table->setStyle($style);
	

$table->setStyle('borderless');
$table->render();

$style2 = new \Symfony\Component\Console\Style\SymfonyStyle($input, $output);

$isDevMode = true;
 ini_set('memory_limit', '1056M');
$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array(__DIR__), $isDevMode);

$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'index',
    'user'     => 'root',
    'password' => 'root'
);

$entityManager= \Doctrine\ORM\EntityManager::create($connectionOptions, $config);



$rsm = new \Doctrine\ORM\Query\ResultSetMapping();
// build rsm here

$sql = 'SELECT * FROM `person` p left join person p2 on p2.id = p.id' ; 
$stmt = $entityManager->getConnection()->prepare($sql);
$users = $stmt->execute();
$timestamp_debut = microtime(true);
 
print_r($stmt->fetchAll(\PDO::FETCH_COLUMN));
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
$style = new \Symfony\Component\Console\Style\SymfonyStyle($input, $output);
$style->success('temps d excution est :'.$difference_ms );

    }
}
