#!/usr/bin/env php
<?php


require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

	$colors = new Cli\Colors();
        
//	echo $colors->getColoredString("Testing Colors class, this is purple string on yellow background.", "purple", "yellow") . "\n";
//	echo $colors->getColoredString("Testing Colors class, this is blue string on light gray background.", "blue", "light_gray") . "\n";
//	echo $colors->getColoredString("Testing Colors class, this is red string on black background.", "red", "black") . "\n";
//	echo $colors->getColoredString("Testing Colors class, this is cyan string on green background.", "cyan", "green") . "\n";
	
        echo "\n" ; 
        echo $colors->getColoredString('==============================================================================', "red", null ) . "\n";
        echo $colors->getColoredString("   ______                           _ __  ____        _ __    __         
  / ____/___  ________  ______   __(_) /_/ __ )__  __(_) /___/ /__  _____
 / /   / __ \/ ___/ _ \/ ___/ | / / / __/ __  / / / / / / __  / _ \/ ___/
/ /___/ /_/ (__  )  __/ /   | |/ / / /_/ /_/ / /_/ / / / /_/ /  __/ /    
\____/\____/____/\___/_/    |___/_/\__/_____/\__,_/_/_/\__,_/\___/_/     
", "cyan") . "\n";

        echo $colors->getColoredString('Version 1.0.0 *** last build 2017-03-26 10h00 by nadir.fouka@gmail.com', "cyan", null ) . "\n";
        echo $colors->getColoredString('==============================================================================', "red", null ) . "\n";

$application = new Application();
$application->add(new \Cli\AppCommandSymfony());
$application->add(new \Cli\AppCommandSymfony_1);
$application->run();




