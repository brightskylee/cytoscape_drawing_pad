
$(function(){
	
	$('#export_btn').on('click', function(){
		
		var cy = $('#cy').cytoscape('get');
		var graph_json = JSON.stringify(cy.json());
                //console.log(graph_json);		
		
		
		
		//console.log($.isPlainObject({'graph_json': graph_json}));
		$.ajax({
			url: 'download.php',
			type: 'POST',
			data: {"data": graph_json, "mode": canvas_mode},
			cache: false,
			dataType: 'text',
			success: function(data){
				
				console.log(data);
				if(canvas_mode == "general"){
					//console.log("general call back function is executed");
					window.location = 'download.php?download&general';
				}
				else if(canvas_mode == "tree"){
					//console.log("tree call back function is executed");
					window.location = 'download.php?download&tree';
				}
				else
					alert("something has gone wrong");
			}
			
		})
	})
	
	
	
})
