function hideProperty(){
	$('#node_property_box').hide();
	$('#edge_property_box').hide();
}

function toggleCreateMode(){
	
	crtMode = "on";
	
	hideProperty();
	$('#edit_tools_box').hide();
	
	if(cy.elements('*:selected').length >= 1){
		cy.elements('*:selected').unselect();
    }
	cy.elements('*').ungrabify();
    cy.elements('*').unselectify();
}

function toggleEditMode(){
	
	crtMode = "off";
	
	hideProperty();
	$('#edit_tools_box').show();
	
	cy.elements('*').grabify();
    cy.elements('*').selectify();
}

$(function(){
	

	var cy = $('#cy').cytoscape('get');
	window.crtMode = 'on';
	/*
	if( ('#create_mode_btn').attr('class') = "active" ){
		toggleCreateMode();
	}
	*/
	
	$('#edit_tools_box').hide();
	
	$('#create_mode_btn').on('click', function(){
		toggleCreateMode();
	});
	
	$('#edit_mode_btn').on('click', function(){
		toggleEditMode();
	});
	
})