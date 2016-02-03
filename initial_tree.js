$(function(){
	
	window.canvas_mode = "tree";

	$('#cy').cytoscape({
	style: cytoscape.stylesheet()
		.selector('node')
			.css({
				'content':'data(name)',
				'font-size':'8px',
				'width':'10px',
				'height':'10px',
				'background-color': 'blue',
				'pie-size': '100%',
				'pie-1-background-color': 'red',
				'pie-1-background-size': 'mapData(weightedPositive, 0, 1, 0, 100)',
			})
	  
		.selector('edge')
			.css({      
				'line-color': 'gray',
				'font-size': '8px',
				'target-arrow-shape': 'triangle',
				'content': 'data(name)'
				})
      
		.selector(":selected")
			.css({
				'background-color': '#000',
				'line-color': '#000',
			}),
			

		layout: {
			name: 'dagre',

		  // dagre algo options, uses default value on undefined
		// nodeSep: 10, // the separation between adjacent nodes in the same rank
		 //edgeSep: 20, // the separation between adjacent edges in the same rank
		 //rankSep: 10, // the separation between adjacent nodes in the same rank
		 //rankDir: undefined, // 'TB' for top to bottom flow, 'LR' for left to right
		 //minLen: function( edge ){ return 1; }, // number of ranks to keep between the source and target of the edge
		  // general layout options
		 //fit: true, // whether to fit to viewport
		 //padding: 30, // fit padding
		 //animate: false, // whether to transition the node positions
		 //animationDuration: 500, // duration of animation in ms if enabled
		 //boundingBox: undefined, // constrain layout bounds; { x1, y1, x2, y2 } or { x1, y1, w, h }
		 //ready: function(){}, // on layoutready
		 //stop: function(){} // on layoutstop
	},
			
	ready: function(){
		
		window.cy = this;
	}
	})
})

