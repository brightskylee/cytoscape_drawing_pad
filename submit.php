<?php
/*
function parseSif($file){
	
	if(($fp = fopen($file,'r')) == NULL){
		echo '{"status":"error", "description":"file open error"}';
		exit;
	};
	
	$node_array = array();
	$edge_array = array();
	
	
	while(!feof($fp)){
		$string = fgets($fp);
		$array = explode(' ', $string);
		$node_array = array_merge($node_array, array(array('data' => array('id' => $array[0], 'name' => $array[0]))));
		$node_array = array_merge($node_array, array(array('data' => array('id' => trim($array[2]), 'name' => trim($array[2])))));
		$edge_array = array_merge($edge_array, array(array('data' => array('source' => $array[0], 'target' => trim($array[2])))));
	}
	
	$elements = array("nodes" => $node_array, "edges" => $edge_array);
	return $elements;
	
}
*/

// A list of permitted file extensions
$allowed = array('sif','txt');

if(isset($_FILES['file_selected']) && $_FILES['file_selected']['error'] == 0){

    $extension = pathinfo($_FILES['file_selected']['name'], PATHINFO_EXTENSION);

    if(!in_array(strtolower($extension), $allowed)){
        echo '{"status":"error", "description":"file format not supported"}';
        exit;
    }
	$fileSelected = $_FILES['file_selected']['tmp_name'];
	//echo $fileSelected."\n";
	//echo "java -classpath .:./json.jar ParseSif $fileSelected";
	if($extension == "sif"){
		echo shell_exec("java -classpath .:json.jar ParseSif $fileSelected");
	}
	elseif($extension == "txt"){
		echo shell_exec("java -classpath .:json.jar ParseTree $fileSelected");
	}	
        
	//echo(json_encode($output[0]));
}

else{
	if(isset($_FILES['file_selected'])){
		echo '{"status":"error", "description":"file error not 0"}';
	}
	else{
		echo '{"status":"error", "description":"isset file not passed"}';
	}
	exit;
}
