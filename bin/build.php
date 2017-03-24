#!/usr/bin/env php
<?php


require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;



class AppCommandSymfony extends Command
{
    protected function configure()
    {

	$this
			->setName('coservit:load_data')
			->setDescription('Loading all data from database Mysql LAMP')
			->setHelp('This command allows you to create a user...')
    ;
        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {		
	
	  $style = new SymfonyStyle($input, $output);
        $style->title('Welcome to SymfonyStyle');
        $style->section('Wow, look at this text section');
$style->text('Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, Lorem ipsum dolor, ');


$style->note('Make sure you write some *real* text eventually');
 $style->comment('Lorem ipsum is just Latin garbage');
$style->comment('So don\'t overuse it');
      $style->section('How about some BIG messages?');
$style->success('I <3 lorem ipsum');
  $style->error('You should stop using lorem ipsum');
$style->caution('STOP USING IT SRSLY!');

 $style->table(
            ['User', 'Birthday'],
            [
                ['weaverryan', 'June 5th'],
                ['leannapelham', 'All February']
            ]
);

		 $table = new Table($output);
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
		    new TableSeparator(),
		    array('960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'),
		    array('80-902734-1-6', 'And Then There Were None', 'Agatha Christie'),
		));

	// by default, this is based on the default style
$style = new TableStyle();

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

$style2 = new SymfonyStyle($input, $output);

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__), $isDevMode);

$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'index',
    'user'     => 'root',
    'password' => 'root'
);

$entityManager=  EntityManager::create($connectionOptions, $config);



$rsm = new ResultSetMapping();
// build rsm here

$sql = 'SELECT * FROM `person` p left join person p2 on p2.id = p.id' ; 
$stmt = $entityManager->getConnection()->prepare($sql);
$users = $stmt->execute();
$timestamp_debut = microtime(true);
 
print_r($stmt->fetchAll(PDO::FETCH_COLUMN));
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
 $style = new SymfonyStyle($input, $output);
$style->success('temps d excution est :'.$difference_ms );

    }
}


foreach ( \Cli\SPDO::getInstance()->query('SELECT id, nom, adress FROM person ') as $membre)
{
  echo '<pre>', print_r($membre) ,'</pre>';
}

$application = new Application();
$application->add(new AppCommandSymfony());
$application->run();





