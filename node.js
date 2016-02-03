$(function(){
	var cy = $('#cy').cytoscape('get');
	
	$('#node_name').bind('change', function(){
			var n = cy.elements("node:selected");
			var newVal = $(this).val();
			
			n.data('name', newVal);
			
		});
		
	$('#node_background_color').bind("change",function(){
			
		var n = cy.elements("node:selected");//.css("background-color", $('#color1').val());
		var id = n.id();
			
			cy.style()
					.selector("node[id='"+id+"']")
						.css({"background-color": $('#node_background_color').val()})
					//.selector("node[id='"+id+"']:selected")
						//.css({"background-color": "#000000"/*reverseColor($('#color1').val())*/})
					.update()
				;
		});
		
	$('#node_background_opacity').bind("change",function(){
			var nodes = cy.elements("node:selected");
			for (var i=0; i < nodes.size(); i++)
			{
				var id = nodes[i].id();
				cy.style()
					.selector("node[id='"+id+"']")
						.css({"background-opacity": $('#node_background_opacity').val()})
					//.selector("node[id='"+id+"']:selected")
						//.css({"border-width": 5})
					.update()
				;
			}
		});
		
		$('#node_border_width').bind("change",function(){
			var nodes = cy.elements("node:selected");
			for (var i=0; i < nodes.size(); i++)
			{
				var id = nodes[i]._private.data.id;
				cy.style()
					.selector("node[id='"+id+"']")
						.css({"border-width": $('#node_border_width').val()})
					//.selector("node[id='"+id+"']:selected")
						//.css({"border-width": 5})
					.update()
				;
			}
		});
		
		$('#node_shape').bind("change",function(){
			var nodes = cy.elements("node:selected");
			//console.log(nodes);
			for (var i=0; i < nodes.size(); i++)
			{
				var id = nodes[i].id();
				cy.style()
					.selector("node[id='"+id+"']")
						.css({"shape": $('#node_shape').val()})
					.update()
				;
			}
		});
})