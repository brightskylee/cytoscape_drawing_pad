function showNodeProperty(n){
	
	$('#edge_property_box').hide();
	
	var id = n.id();
	var name = n.data('name');
	var background_color = n.style('background-color');
	var background_opacity = n.style('background-opacity');
	var border_width = n.style('border-width');
	var shape = n.style('shape');
	//console.log(border_width);
	//console.log(n.data());
	$('#node_id').val(id);
	$('#node_name').val(name);
	$('#node_background_color').val(background_color);
	$('#node_background_opacity').val(background_opacity);
	$('#node_border_width').val(border_width);
	$('#node_shape').val(shape);
	$('#node_property_box').show();
	
}

function showEdgeProperty(n){
	
	$('#node_property_box').hide();
	
	var id = n.id();
	var name = n.data('name');
	var source_arrow_shape = n.style('source-arrow-shape');
	var source_arrow_color = n.style('source-arrow-color');
	var target_arrow_shape = n.style('target-arrow-shape');
	var target_arrow_color = n.style('target-arrow-color');
	var line_color = n.style('line-color');
	var line_style = n.style('line-style');
	var width = n.style('width');
	
	$('#edge_id').val(id);
	$('#edge_name').val(name);
	$('#edge_source_arrow_color').val(source_arrow_color);
	$('#edge_source_arrow_shape').val(source_arrow_shape);
	$('#edge_target_arrow_color').val(target_arrow_color);
	$('#edge_target_arrow_shape').val(target_arrow_shape);
	$('#edge_line_style').val(line_style);
	//console.log(width);
	$('#edge_width').val(width);
	$('#edge_line_color').val(line_color);
	$('#edge_property_box').show();
	
}
	
$(function(){
	
	var cy = $('#cy').cytoscape('get');
	var currently_pressed_keys = 'null';
	
	cy.ready(function(){

		cy.on('mousedown',function(e){
			//console.log("mousedown:  " + currently_pressed_keys);
			if(crtMode == 'off' && currently_pressed_keys == 'null'){
				var tg = e.cyTarget;
				if(!(tg == cy)){
					if(tg.isNode()){
						showNodeProperty(tg);
					}
					else if(tg.isEdge()){
						showEdgeProperty(tg);
					}
				}
				else{
					hideProperty();
					cy.$(':selected').unselect();
				}
			}
			else if(crtMode == 'off' && currently_pressed_keys == 17){
				var tg = e.cyTarget;
				if(!(tg == cy)){
					cy.remove(tg);
				}			
			}
		});
	
	/*
	$.getScript("mynode.js", function(){
		console.log("Load mynode.js success");
	});
	
	$.getScript("myedge.js", function(){
		console.log("Load myedge.js success");
	}); 
	*/
	
	$(document).bind('keydown', function(event){
		if(crtMode == 'off'){
			currently_pressed_keys = event.keyCode;
			switch (event.keyCode){
				case 16:
					cy.boxSelectionEnabled(true);
					break;
				case 17:
					$(".mif-bin").css("color", "red");
					break;
				default:
					break;
			}
		}
	});
	
	$(document).bind('keyup', function(event){
		currently_pressed_keys = 'null';
		//console.log("keyup: " + currently_pressed_keys);
		if(crtMode == 'off'){
			switch(event.keyCode){
				case 16:
					cy.boxSelectionEnabled(false);
					break;
				case 17:
					$(".mif-bin").css("color", "");
					break;
				default:
					break;
			}
		}
	});
	
	
	$(".mif-cross").on('click', function(){
		cy.$(':selected').remove();
	});
	
	$(".mif-cross").hover(function(){
		$(this).css("color", "red");
	}, function(){
		$(this).css("color", "");
	});
	
	$(".mif-stack").hover(function(){
		$(this).css("color", "red");
	}, function(){
		$(this).css("color", "");
	});
	
	$(".mif-stack").on('click', function(){
		var eles = cy.$(':selected');
		var stylesheet = eles.css();
		var eles_json = $.extend(true, [], eles.jsons());
		var copied_eles = cy.collection();
		var nodeid_map = [];
		$.each(eles_json, function(){
			if(this.group == 'nodes'){
				var next_node_id = "n"+cy.$('node').size();
				nodeid_map[this.data.id] = next_node_id;
				cy.add({
					group: "nodes",
					data: {id: nodeid_map[this.data.id], name: this.data.name},
					position: {x: this.position.x - 50, y: this.position.y - 50}
				})
				copied_eles = copied_eles.add('node#'+next_node_id);
			}
			if(this.group == 'edges'){
				var next_edge_id = "e"+cy.$('edge').size();
				cy.add({
					group: "edges",
					data: {id: next_edge_id, source: nodeid_map[this.data.source], target: nodeid_map[this.data.target]},
				});
				copied_eles = copied_eles.add('edge#'+next_edge_id);
			}
			
		});
		//console.log(nodeid_map);
		eles.unselect();
		copied_eles.select();
		//console.log(stylesheet);
		//copied_eles.css(stylesheet);
		
		
		//console.log(eles_copy);
		//console.log(eles.jsons());
	})
		
	});
})
