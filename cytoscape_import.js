function prepareUpload(event){

	files = event.target.files;
	//console.log(files);
	$('#import_form').submit();
}

function uploadFiles(event){

	event.preventDefault();

	$.ajax({
		url: 'submit.php',
		type: 'POST',
		data: new FormData(this),
		cache: false,
		dataType: 'text',
		processData: false,
		contentType: false,
	
		success: function(data){
			
			console.log(data);
			var cy = $('#cy').cytoscape('get');
			var json_formated_data = $.parseJSON(data);
			if(canvas_mode == 'tree'){
				for(index=0; index < json_formated_data.nodes.length; ++index){
					if(json_formated_data.nodes[index].data.levelnum == 0){
						var max_num = json_formated_data.nodes[index].data.totalnum;
					} 
				}
				
				cy.style()
					.selector('node')
						.css({
							'width': 'mapData(totalnum, 0, ' + max_num + ', 10, 40)',
							'height': 'mapData(totalnum, 0, ' + max_num + ', 10, 40)'
						})
					.update()
				;
			}
			//console.log(json_formated_data);
			cy.startBatch();
			cy.load(json_formated_data);
			cy.endBatch();
			
			$('#edit_mode_btn').trigger("click");

			/*
			var concentric_layout = cy.makeLayout({
			  name: 'concentric'
			});
			concentric_layout.run();
			*/
		},
		
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.statusText);
			alert(xhr.responseText);
			alert(xhr.status);
			alert(thrownError);
		},
		
	});

}


$(function(){
	
	var files;

	
	$(document).ajaxSend(function(event, xhr, settings){
		if(settings.url == "submit.php" || settings.url == "download.php"){
			$('#log_window_box_scroll').append("<p>Loading network file");
			$.blockUI({ message: '<img src="loading.gif"/><h1>Please wait patiently</h1>' });
		}
	});
	

	$(document).ajaxComplete(function(event, xhr, settings){
		if(settings.url === "submit.php" || settings.url === "download.php") {
			$('#log_window_box_scroll').append("<p>Network file loaded</p>");
			$.unblockUI();
		}
	});

	$('#import_btn').on('click', function(){
		$('#file_selected').click();
	});

	$('#file_selected').on('change',prepareUpload);

	$('form').on('submit', uploadFiles);

})	
