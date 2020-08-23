<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Cli;

/**
 * Description of AppCommandSymfony 2 63 
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
                
                
        $this
                 ->addArgument('arg1', InputArgument::REQUIRED)
                 ->addArgument('arg2', InputArgument::REQUIRED)
                 ->addArgument('arg3', InputArgument::REQUIRED)
                 ->addArgument('arg4', InputArgument::REQUIRED)
                 ->addArgument('arg5', InputArgument::REQUIRED)
                 ->addArgument('arg6', InputArgument::REQUIRED)
                 ->addArgument('arg7', InputArgument::REQUIRED)
                 ->addArgument('arg8', InputArgument::REQUIRED) 
                 ->addArgument('arg9', InputArgument::REQUIRED)
                 ->addArgument('arg10', InputArgument::REQUIRED)
                 ->addArgument('arg11', InputArgument::REQUIRED)
                 ->addArgument('arg12', InputArgument::REQUIRED)
                 ->addArgument('arg13', InputArgument::REQUIRED)
                 ->addArgument('arg14', InputArgument::REQUIRED)
                 ->addArgument('arg15', InputArgument::REQUIRED)
                 ->addArgument('arg16', InputArgument::REQUIRED) 
                
        ;
     
        
    }

    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {	

        $container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
        $loader = new \Symfony\Component\DependencyInjection\Loader\XmlFileLoader(
                $container, 
                new \Symfony\Component\Config\FileLocator(__DIR__."/../../conf/db/parameters.yml"));
                $loader->load(__DIR__.'/../../conf/services/services.xml');
        
                 $arg1      =    $input->getArgument('arg1');
                 $arg2      =    $input->getArgument('arg2');
                 $arg3      =    $input->getArgument('arg3');
                 $arg4      =    $input->getArgument('arg4');
                 $arg5      =    $input->getArgument('arg5');
                 $arg6      =    $input->getArgument('arg6');
                 $arg7      =    $input->getArgument('arg7');
                 $arg8      =    $input->getArgument('arg8');
                 $arg9      =    $input->getArgument('arg9');
                 $arg10     =    $input->getArgument('arg10');
                 $arg11     =    $input->getArgument('arg11');
                 $arg12     =    $input->getArgument('arg12');
                 $arg13     =    $input->getArgument('arg13');
                 $arg14     =    $input->getArgument('arg14');
                 $arg15     =    $input->getArgument('arg15');
                 $arg16     =    $input->getArgument('arg16');
                 
                 $collection = (new ClientManager($container->getParameter('mongo_url_mongo'), array()) )
                         
                                ->selectCollection(
                                        $container->getParameter('database'), 
                                        $container->getParameter('collection')
                                        ) ; 

                $curl = curl_init();
                $url = new QueryBuilder(                
                                        $arg1 ,
                                        $arg2 ,
                                        $arg3 ,
                                        $arg4 ,
                                        $arg5 ,
                                        $arg6 ,
                                        $arg7 ,
                                        $arg8 ,
                                        $arg9 ,
                                        $arg10 ,
                                        $arg11 ,
                                        $arg12 ,
                                        $arg13 ,
                                        $arg14 ,
                                        $arg15 ,
                                        $arg16 
                        ) ;

curl_setopt_array($curl, array(
  CURLOPT_URL => $url->executeQuery() , 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "key: ". $container->getParameter('key_blablaCar')
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$xml    =   json_decode($response)  ; 
$data = $xml->trips ; 

foreach ( $data as $key=>$value) {
                
		$insertOneResult = $collection->insertOne([
		    'lat' 	=> $value->departure_place->latitude ,
		    'log' 	=> $value->departure_place->longitude,
		    'departure_date' 	=> $value->departure_date , 
                    'departure_place' => array(
                        'city_name' => $value->departure_place->city_name , 
                        'address' => $value->departure_place->address , 
                        'latitude' => $value->departure_place->latitude , 
                        'longitude' => $value->departure_place->country_code 
                    ) , 
                    'arrival_place' => 
                        array(
                            'city_name' => $value->arrival_place->city_name , 
                            'address' => $value->arrival_place->address , 
                            'latitude' => $value->arrival_place->latitude , 
                            'longitude' => $value->arrival_place->country_code 
                        ) , 
                    
		]);

}


curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
    print_r($data) ; 
}

        $output->writeln('<info> ============================= .</info>') ; 
        $output->writeln('<info> ||   Data has been loaded. || </info>') ; 
        $output->writeln('<info> ============================= .</info>') ; 

    }
    

    
}
