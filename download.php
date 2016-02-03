<?php

	$basename = getcwd();
	
	if(isset($_POST["data"]) && !empty($_POST["data"])){
		
		switch($_POST["mode"]){
			
			case "tree":
				
				$fileName = "/download.txt";
				if(($file = fopen($basename.$fileName, "w")) == NULL){
					echo "file open for writing error";
					exit;
				}
				
				$array = json_decode($_POST["data"], true);
				
				fwrite($file, "mark"."\t"."levelnumber"."\t". "ruleid"."\t"."weightedPositive"."\t"."totalnum"."\t"."parentid"."\t"."childrenid"."\n");
				foreach($array['elements']['nodes'] as $node){
					for($i=0; $i<=$node['data']['levelnum']; $i++){
						fwrite($file, "+");
					}
					fwrite($file, "\t".$node['data']['levelnum']."\t".end(explode("&&", $node['data']['id']))."\t".$node['data']['weightedPositive']."\t".$node['data']['totalnum']."\t".$node['data']['parentid']."\t".$node['data']['childrenid']."\n");
				}
				//echo "tree mode success";
				break;
			
			case "general": 
			
				$fileName = "/download.sif";
				if(($file = fopen($basename.$fileName, "w")) == NULL){
					echo "file open for writing error";
					exit;
				}
				$array = json_decode($_POST["data"], true);
				foreach($array['elements']['edges'] as $edge){
					fwrite($file, $edge['data']['source'].' PP '.$edge['data']['target']."\n");
				}
				//echo "general mode success";
				break;
			
			default:
				//echo "error";
				exit("Error");
		}
		
	}
	elseif(isset($_GET['download'])){
		
		$fileName = "/download.txt";
		header("Content-Disposition: attachment; filename=$basename.$fileName");
		readfile($basename.$fileName);
	}
	else{
		exit("this script should not be called directly");
	}
	
	
	
?>