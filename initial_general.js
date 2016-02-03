$(function(){
	
	window.canvas_mode = "general";
	
	$('#cy').cytoscape({
	style: cytoscape.stylesheet()
		.selector('node')
			.css({
				'content':'data(name)',
				'font-size':'8px',
				'width':'10px',
				'height':'10px'
			})
	  
		.selector('edge')
			.css({      
				'line-color': 'gray',
				})
      
		.selector(":selected")
			.css({
				'background-color': '#000',
				'line-color': '#000',
			}),
			
	ready: function(){
		
		window.cy = this;
	}
	})
})

