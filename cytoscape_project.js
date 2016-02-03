$(function(){
	$('#new_project_dialog').dialog({
		position: {my: "center", at: "center", of: window},
		modal: true
	});
	
	$('#new_project_dialog').dialog('close');
	
	$('#new_project').click(function(){
		$('#new_project_dialog').dialog('open');
	});
	
	$('#new_project_go').click(function(){
		if(document.getElementById("general_canvas").checked){
			var win = window.open('general.php');
			if(win){
				//Browser has allowed it to be opened
				win.focus();
			}else{
				//Broswer has blocked it
				alert('Please allow popups for this site');
			}
		}
		else if(document.getElementById("fuzzyTree_canvas").checked){
			var win = window.open('fuzzyTree.php');
			if(win){
				//Browser has allowed it to be opened
				win.focus();
			}else{
				//Broswer has blocked it
				alert('Please allow popups for this site');
			}
		}
		else{
			alert("Please select a canvas mode to begin");
		}
		
		$("#new_project_dialog").dialog('close');
	})
})