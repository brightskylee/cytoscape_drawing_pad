$(function(){
  
    var cy = $('#cy').cytoscape('get');
	
	cy.ready(function(){
		
		
		//Create a node when click on empty space
		cy.on('click', function(e){
			//console.log(e.cyTarget === cy);
			//console.log(crtMode == 'on');
			if(e.cyTarget === cy && crtMode == 'on'){
				var xposi = event.pageX - parseInt($("#cy").offset().left);
				var yposi = event.pageY - parseInt($("#cy").offset().top);
				var randomNum = (Math.floor(Math.random()*100000)).toString();
				$( "#log_window_box_scroll" ).append( "<br>Created node at X: " + xposi+ ", Y: " + yposi);
				cy.add({
					group: 'nodes',
					data: {name: randomNum},
					grabbable: false,
					selectable: false,
					renderedPosition: {x:xposi, y:yposi}
				});
				/*
				cy.nodes("[name="+randomNum+"]").on('select',function(){
                 if(cy.elements('node:selected').length == 1){
                    showPropertyBox('node')
                 }
                }) 
				
              on('unselect',function(){hidePropertyBox();}); */
              
            //console.log(allNodeSet);
			}
		});
		
		cy.on('mouseover','node',function(){
			$('#cy').css('cursor','pointer');
		});
		
		cy.on('mouseout','node',function(){
			$('#cy').css('cursor','default');
		});
	
		//Create Edge
		cy.on('mousedown', 'node', function(e){
			if(crtMode == 'on'){
				//console.log('mousedown is encountered');
				var source_node = e.cyTarget;
				cy.on('mouseup', function(e){
				   var target_node = e.cyTarget;
				        if(!(target_node === cy)){
							if(target_node.isNode()){
								$( "#log_window_box_scroll" ).append( "<br>Created edge:{source: " + source_node.data('name')+ " target: " + target_node.data("name"));
								cy.add({
									group: 'edges',
									data: {source: source_node.id(), target: target_node.id()}
								});
							}
						}
					cy.off('mouseup');                
				});
			}    
        });
		
	});
})