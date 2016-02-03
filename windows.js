$(function(){
		
	//Create the main windows
	//TODO: Adjust the initial positions.
	$('#mode_window_box').dialog({position: {my: "right bottom", at: "right bottom", of: window}});
	$('#log_window_box').dialog({position: { my: "left bottom", at: "left bottom", of: window }});
	$('#tools_window_box').dialog({position: { my: "left bottom", at: "left bottom", of: window }});
	$('#property_window_box').dialog({position: { my: "right bottom", at: "right bottom", of: window }});
	
	//console.log("hide node property");
	$('#node_property_box').hide();
	//console.log("hide_edge property");
	$('#edge_property_box').hide();
	
	//Sync mode window status on load
	if( $('#mode_window_box').dialog("isOpen") == true){
		$('#mode_window').html("<span style='color:red'>Hide</span> Mode Window");
	}
	else{
		$('#mode_window').html("<span style='color:blue'>Show</span> Mode Window");
	}
	
	
	//Sync log window status on load
	if( $('#log_window_box').dialog("isOpen") == true){
		$('#log_window').html("<span style='color:red'>Hide</span> Log Window");
	}
	else{
		$('#log_window').html("<span style='color:blue'>Show</span> Log Window");
	}

	//Sync tools window status on load
	if( $('#tools_window_box').dialog("isOpen") == true){
		$('#tools_window').html("<span style='color:red'>Hide</span> Tools Window");
	}
	else{
		$('#tools_window').html("<span style='color:blue'>Show</span> Tools Window");
	}
	
	//Sync property window status on load
	if( $('#property_window_box').dialog("isOpen") == true){
		$('#property_window').html("<span style='color:red'>Hide</span> Property Window");
	}
	else{
		$('#property_window').html("<span style='color:blue'>Show</span> Property Window");
	}
	
	
	//Sync Mode Window status on dialog close
	$('#mode_window_box').bind('dialogclose', function(){
		$('#mode_window').html("<span style='color:blue'>Show</span> Mode Window");
	});
	
	//Sync Log Window status on dialog close
	$('#log_window_box').bind('dialogclose', function(){
		$('#log_window').html("<span style='color:blue'>Show</span> Log Window");
	});
	
	//Sync tools window status on dialog close
	$('#tools_window_box').bind('dialogclose', function(){
		$('#tools_window').html("<span style='color:blue'>Show</span> Tools Window");
	});
	
	//Sync property window status on dialog close
	$('#property_window_box').bind('dialogclose', function(){
		$('#property_window').html("<span style='color:blue'>Show</span> Property Window");
	});
	
	//Toggle mode window
	$('#mode_window').click(function(){
		if($('#mode_window_box').dialog("isOpen") == true){		
            $('#mode_window_box').dialog('close');
			$('#mode_window').html("<span style='color:blue'>Show</span> Mode Window");
        }
        else{
            $('#mode_window_box').dialog('open');
			$('#mode_window').html("<span style='color:red'>Hide</span> Mode Window");
        }
    });
	  

	//Toggle log window
	$('#log_window').click(function(){
        if($('#log_window_box').dialog("isOpen") == true){
            $('#log_window_box').dialog('close');
			$('#log_window').html("<span style='color:blue'>Show</span> Log Window");
        }
        else{
            $('#log_window_box').dialog('open');
			$('#log_window').html("<span style='color:red'>Hide</span> Log Window");
        }
    });
	  

	//Toggle tools window
	$('#tools_window').click(function(){
        if($('#tools_window_box').dialog("isOpen") == true){
            $('#tools_window_box').dialog('close');
			$('#tools_window').html("<span style='color:blue'>Show</span> Tools Window");
        }
        else{
            $('#tools_window_box').dialog('open');
			$('#tools_window').html("<span style='color:red'>Hide</span> Tools Window");
        }
    });
	  

	//Toggle property window
	$('#property_window').click(function(){
        if($('#property_window_box').dialog("isOpen") == true){
            $('#property_window_box').dialog('close');
			$('#property_window').html("<span style='color:blue'>Show</span> Property Window");
        }
        else{
            $('#property_window_box').dialog('open');
			$('#property_window').html("<span style='color:red'>Hide</span> Property Window");
        }
    });
})