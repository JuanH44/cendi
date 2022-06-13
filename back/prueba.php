<?php      
$a = array ('a' => 'manzana', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
$b = array ('c' => 'masf', 'asd' => 'basafa', 'g' => array ('b', 'm', 'i'));
$c = array ('d' => 'masasdff', 'fsaasd' => 'gdbasafa', 'ghg' => array ('hb', 'jm', 'ui'));
$result=array();
$result[]=$a;
$result[]=$b;
$result[]=$c;
print_r ($result);
?>