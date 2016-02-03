$(function(){
	var cy = $('#cy').cytoscape('get');
	
	$('#edge_name').bind('change', function(){
			var n = cy.elements("edge:selected");
			var newVal = $(this).val();
			
			n.data('name', newVal);
			
		});
		

	$('#edge_source_arrow_shape').bind("change",function(){
		var edges = cy.elements("edge:selected");
			//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"source-arrow-shape": $('#edge_source_arrow_shape').val()})
				.update()
			;
		}
	});
		
	$('#edge_source_arrow_color').bind("change",function(){
		var edges = cy.elements("edge:selected");
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"source-arrow-color": $('#edge_source_arrow_color').val()})
				.update()
			;
		}
	});
		
	
	$('#edge_target_arrow_shape').bind("change",function(){
		var edges = cy.elements("edge:selected");
		//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"target-arrow-shape": $('#edge_target_arrow_shape').val()})
				.update()
			;
		}
	});
	
	$('#edge_target_arrow_color').bind("change",function(){
		var edges = cy.elements("edge:selected");
		//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"target-arrow-color": $('#edge_target_arrow_color').val()})
				.update()
			;
		}
	});
	
	//line style
	$('#edge_line_style').bind("change",function(){
		var edges = cy.elements("edge:selected");
		//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"line-style": $('#edge_line_style').val()})
				.update()
			;
		}
	});
	
	$('#edge_line_color').bind("change",function(){
		var edges = cy.elements("edge:selected");
		//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"line-color": $('#edge_line_color').val()})
				//.selector("edge[id='"+id+"']:selected")
					//.css({"line-color": "#000000"/*reverseColor($('#color1').val())*/})	
				.update()
			;
		}
	});
	
	$('#edge_width').bind("change",function(){
		var edges = cy.elements("edge:selected");
		//console.log(edges);
		for (var i=0; i < edges.size(); i++)
		{
			var id = edges[i]._private.data.id;
			cy.style()
				.selector("edge[id='"+id+"']")
					.css({"width": $('#edge_width').val()})
				.update()
			;
		}
	});
})