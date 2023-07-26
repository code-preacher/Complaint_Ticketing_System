<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>
<?php
set_time_limit(50000);
for ($i=0; $i < 1000000; $i++) { 
$a=array('sunny','overcast', 'rainy');
$a2=array_rand($a);
$a3=$a[$a2];
$b=rand(00,99);
$c=rand(00,99);
$d=array('TRUE','FALSE');
$d2=array_rand($d);
$d3=$d[$d2];
$e=array('yes','no');
$e2=array_rand($e);
$e3=$e[$e2];

// echo $a3.'<br>'.$b.'<br>'.$c.'<br>'.$d3.'<br>'.$e3;
// $crud->insertTest($a3,$b,$c,$d3,$e3);
}

// //Add to Crud.php
// public function insertTest($v1,$v2,$v3,$v4,$v5)
// 	{
// 		$query="INSERT INTO test(it1,it2,it3,it4,it5) VALUES('$v1','$v2','$v3','$v4','$v5')";
// 		$this->con->query($query);
	
// 	}
?>

