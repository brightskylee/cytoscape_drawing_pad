<?php

if($_POST['siffile']){
	$file = $_POST['siffile'];
	$file_parts = pathinfo($file);
	
	if($file_parts['extension'] == 'sif'){
		$fp = fopen($file,'r');
		$node_array = array();
		$edge_array = array();
		while(!feof($fp)){
			$string = fgets($fp);
			$array = explode(' ', $string);
			$node_array = array_merge($node_array, array(array('data' => array('id' => $array[0], 'name' => 'node_'.$array[2]))));
			$edge_array = array_merge($edge_array, array(array('data' => array('source' => $array[0], 'target' => $array[2]))));
		}
         $elements = array("nodes" => $node_array, "edges" => $edge_array);
		 echo json_encode($elements);
	}
	else
		echo "This is no a sif file";
	}
		
?>
