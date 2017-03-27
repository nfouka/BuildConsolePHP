<?php 


require __DIR__.'/vendor/autoload.php';

class obj implements Serializable {
    private $data;
    public function __construct() {
        $this->data = "Mes données privées";
    }
    public function serialize() {
        return serialize($this->data);
    }
    public function unserialize($data) {
        $this->data = unserialize($data);
    }
    public function getData() {
        return $this->data;
    }
}

$filePath = __DIR__  ;
$colors = new Cli\Colors();
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($filePath),
    RecursiveIteratorIterator::SELF_FIRST);
foreach($files as $name => $file){
	


	echo $colors->getColoredString($name, "black", "green") . "\n";
	

}



 

?> 
 

