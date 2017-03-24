#!/usr/bin/env php
<?php


require __DIR__.'/vendor/autoload.php';

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


$helper = $this->getHelper('question');

        $question = new ChoiceQuestion(
            "What is your favorite website",
            ['sitepoint.com', 'google.com', 'twitter.com'],
            1
        );

        $choice = $helper->ask($input, $output, $question);

        $output->writeln('You chose: '.$choice);


 $table = new Table($output);
        $table
            ->setHeaders(['Country', 'City', 'Population'])
            ->setRows([
                ['USA', 'New-York', '8 405 837'],
                ['France', 'Paris', '2 249 975'],
                ['Germany', 'Berlin', '3 517 424'],
                ['Australia', 'Sydney', '4 757 083'],
                ['England', 'London', '8 416 535']
            ])
        ;
        $table->render();

$progress = new ProgressBar($output, 10);

        $progress->start();

        $i = 0;
        while ($i++ < 10) {
            // ... in order to simulate the progression, I add a `usleep()` method
            usleep(rand(100000, 1000000));

            $progress->advance();
        }

        $progress->finish();



    }
}





class SPDO
{
  /**
   * Instance de la classe PDO
   *
   * @var PDO
   * @access private
   */ 
  private $PDOInstance = null;
 
   /**
   * Instance de la classe SPDO
   *
   * @var SPDO
   * @access private
   * @static
   */ 
  private static $instance = null;
 
  /**
   * Constante: nom d'utilisateur de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_USER = 'root';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_HOST = 'localhost';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_PASS = 'root';
 
  /**
   * Constante: nom de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_DTB = 'index';
 
  /**
   * Constructeur
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   * @access private
   */
  private function __construct()
  {
    $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
  }
 
   /**
    * Crée et retourne l'objet SPDO
    *
    * @access public
    * @static
    * @param void
    * @return SPDO $instance
    */
  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new SPDO();
    }
    return self::$instance;
  }
 
  /**
   * Exécute une requête SQL avec PDO
   *
   * @param string $query La requête SQL
   * @return PDOStatement Retourne l'objet PDOStatement
   */
  public function query($query)
  {
    return $this->PDOInstance->query($query);
  }
}






$application = new Application();
$application->add(new AppCommandSymfony());
$application->run();





