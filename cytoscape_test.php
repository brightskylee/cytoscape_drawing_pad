<!DOCTYPE html>
<html>
<head>
<meta name="description" content="[An example of getting started with Cytoscape.js]" />
<meta charset=utf-8 />
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>


    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/metro-scroll.js"></script>
    <script src="http://cytoscape.github.io/cytoscape.js/api/cytoscape.js-latest/cytoscape.min.js"></script>
<title>Cytoscape.js initialisation</title>




<script>
 
/* 
$( document ).on( "mousemove", function( event ) {    
  $( "#info" ).text( "pageX: " + (event.pageX - parseInt($("#cy").offset().left))+ ", pageY: " + (event.pageY - $("#cy").offset().top));
});
*/

    function decide_elements_controllable(){
         if(window.operation_mode == 0){
            cy.elements('*').ungrabify();
            cy.elements('*').unselectify();
        }
        else if(window.operation_mode == 1){
            cy.elements('*').grabify();
            cy.elements('*').selectify();
         }
    }
    
    function showPropertyBox(elementT){
    
        if(elementT == 'node'){
            
            var currentNode = cy.elements('node:selected');
            var id = currentNode.id();
            var name = currentNode.data('name');
            $('#propertyBox').show().html("ID:<input type='text' name='node_id' value='"+id+"' disabled></input><br>Name:<input type='text' name='node_name' value='"+name+"'></input>");
            
        }
        
    }
    
    function hidePropertyBox(){
        $('#propertyBox').hide();
    }
    
  $(function(){  // on dom ready
  
    window.operation_mode = 0;
    
    
    $('#creation_mode').on('click',function(){
        operation_mode = 0;
        if(cy.elements('*:selected').length >= 1){
            cy.elements('*:selected').unselect();
        }
        decide_elements_controllable();
    });
    
    $('#selection_mode').on('click',function(){
        operation_mode = 1;

        decide_elements_controllable();
    })
  
$('#cy').cytoscape({
  style: cytoscape.stylesheet()
    .selector('node')
      .css({
        'content': 'data(name)',
        'width':'10px',
        'height':'10px'
      })
      
      
      .selector(":selected")
      .css({
        'background-color': '#000',
        'line-color': '#000',
        'target-arrow-color': '#000',
        'text-outline-color': '#000'
      }),
    
 
 /*
  elements: {
    nodes: [
      { data: { id: 'j', name: 'Jerry' }, grabbable: false },
      { data: { id: 'e', name: 'Elaine' }, grabbable: false },
      { data: { id: 'k', name: 'Kramer' }, grabbable: false },
      { data: { id: 'g', name: 'George' }, grabbable: false }
    ],
    edges: [
      { data: { source: 'j', target: 'e' } },
      { data: { source: 'j', target: 'k' } },
      { data: { source: 'j', target: 'g' } },
      { data: { source: 'e', target: 'j' } },
      { data: { source: 'e', target: 'k' } },
      { data: { source: 'k', target: 'j' } },
      { data: { source: 'k', target: 'e' } },
      { data: { source: 'k', target: 'g' } },
      { data: { source: 'g', target: 'j' } }
    ]
  },
  */

  
  

  
  ready: function(){
    window.cy = this;
    decide_elements_controllable();

  
    var clickHandler = function(e){
       //console.log(e.cyTarget === cy);
        if(e.cyTarget === cy && operation_mode==0){
            var xposi = event.pageX - parseInt($("#cy").offset().left);
            var yposi = event.pageY - parseInt($("#cy").offset().top);
            var randomNum = Math.floor(Math.random()*100000);
            $( "#info" ).append( "<br>Created node at X: " + xposi+ ", Y: " + yposi);
            cy.add({
              group: 'nodes',
              data: {name: randomNum},
              grabbable: false,
              renderedPosition: {x:xposi, y:yposi}
            });
            cy.nodes("[name="+randomNum+"]").on('select',function(){
                 if(cy.elements('node:selected').length == 1){
                    showPropertyBox('node')
                 }
                }).
              on('unselect',function(){hidePropertyBox();});
              
            //console.log(allNodeSet);
            decide_elements_controllable();
        }
     }
 
    cy.on('click',clickHandler);
   
    cy.on('mouseover','node',function(){
        $('#cy').css('cursor','pointer');
        //if(operation_mode == 0) {cy.elements('node').ungrabify();}
        //else if(operation_mode == 1) {cy.elements('node').grabify();}
    });
    
    cy.on('mouseout','node',function(){
        $('#cy').css('cursor','default');
    });
    
    cy.on('mousedown', 'node',function(e){
        
      if(operation_mode == 0){
        //console.log('mousedown is encountered');
        var source_node = e.cyTarget;
        cy.on('mouseup',function(e){
            //console.log('mouseup is encountered');
                var target_node = e.cyTarget;
            if(!(target_node === cy)){
              if(target_node.isNode()){
                $( "#info" ).append( "<br>Created edge:{source: " + source_node.data('name')+ " target: " + target_node.data("name"));
                cy.add({
                    group: 'edges',
                    data: {source: source_node.id(), target: target_node.id()}
                    });
                }
                decide_elements_controllable();
              }
            cy.off('mouseup');                
          });
          
        }    
        });
        
      
        //Initial Nodes on select event listener.Would be no use if no initial nodes provided
        cy.nodes().on('select',function(){
          if(cy.elements('node:selected').length == 1){
            showPropertyBox('node')
           }
         }); 
        
    
  }
 });

 

}); // on dom ready

</script>

<style>

body { 
  font: 14px helvetica neue, helvetica, arial, sans-serif;
}

#right-panel {

    height: 100%;
    width: 80%;
    right: 0px;
    position: absolute;
}

#cy {
  height: 75%;
  width: 100%;
  border: solid;

}

#info {
  width: 100%;
  height: 25%;
  color: black;
  top: 1em;
  border-style: ridge;
  overflow-y: scroll;
}

#propertyBox{

    width: 20%;
    height: 40%;
    border: groove;
    position: fixed;
    bottom: 0;
    padding: 2px;
    display: none;  
 }


  
</style>
</head>
<body class="metro">

<nav class="navigation-bar">
    <nav class="navigation-bar-content">
        <div class="element">
            <a class="dropdown-toggle" href="#">File</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a href="#">Open</a></li>
                <li><a href="#">Print</a></li>
                <li><a href="#">Exit</a></li>
            </ul>
        </div>
        
        <div class="element">
            <a class="dropdown-toggle" href="#">Window</a>
            <ul class="dropdown-menu" data-role="dropdown">
                <li><a>Toolbox</a></li>
                <li><a>Log Window</a></li>
                <li><a>Property Window</a></li>
            </ul>
        </div>
 
        <span class="element-divider"></span>
        <a class="element brand" href="#"><span class="icon-spin"></span></a>
        <a class="element brand" href="#"><span class="icon-printer"></span></a>
        <span class="element-divider"></span>
 
        <div class="element input-element">
            <form>
                <div class="input-control text">
                    <input type="text" placeholder="Search...">
                    <button class="btn-search"></button>
                </div>
            </form>
        </div>
 
        <div class="element place-right">
            <a class="dropdown-toggle" href="#">
                <span class="icon-cog"></span>
            </a>
            <ul class="dropdown-menu place-right" data-role="dropdown">
                <li><a href="#">Products</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Buy Now</a></li>
            </ul>
        </div>
        <span class="element-divider place-right"></span>
        <a class="element place-right" href="#"><span class="icon-locked-2"></span></a>
        <span class="element-divider place-right"></span>
        <button class="element image-button image-left place-right">
            Sergey Pimenov
            <img src="images/211858_100001930891748_287895609_q.jpg"/>
        </button>
    </nav>
</nav>



 <div id="right-panel">
  <div id="cy"></div>
  <div id="info">

        Click on the right blank area to create a network

  </div>
 </div>

  <div style="width: 20%" class="button-set" data-role="button-group">
    <button style="width: 100%" class="active" id="creation_mode">Creation Mode</button>
    <button style="width: 100%" id="selection_mode">Selection Mode</button>
  </div>
  
  <div id="propertyBox">
  </div>






    

</body>
</html>

