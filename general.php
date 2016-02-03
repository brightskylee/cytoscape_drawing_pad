<html>
<head>
    <!--<link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">-->
	<link href="metro/build/css/metro.css" rel="stylesheet">
	<link href="metro/build/css/metro-icons.css" rel="stylesheet">
    <link href="metro/docs/js/prettify/prettify.css" rel="stylesheet">

	
	<!-- Metro UI CSS JavaScript plugins -->

	<script src="metro/docs/js/jquery-2.1.3.min.js"></script>
    <script src="metro/build/js/metro.js"/></script>
	<script src="metro/docs/js/docs.js"/></script>

	
    <!-- Load JavaScript Libraries -->
    <!--<script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>-->
    <script src="metro/docs/js/prettify/prettify.js"></script>

	<script src="metro/js/global.js"></script>
	<script src="metro/js/requirements.js"></script>
	<script src="metro/js/widget.js"></script>
    <script src="metro/js/widgets/appbar.js"></script>
	
    <!-- Load JQuery UI -->
    <script src="jquery-ui/jquery-ui.js"></script>
    <link href="jquery-ui/jquery-ui.min.css" rel="stylesheet"/>


    <!-- Local JavaScript -->
    <!--<script src="js/docs.js"></script>-->
    <script src="js/github.info.js"></script>
    <script src="js/metro-scroll.js"></script>
    <script src="http://cytoscape.github.io/cytoscape.js/api/cytoscape.js-latest/cytoscape.min.js"></script>
	
	<!--Self defined CSS files -->
	<link href="initial.css" rel="stylesheet"/>
	
	<!-- Self developped Javascript -->	
	<script src="initial_general.js"></script>
	<script src="windows.js"></script>
	<script src="cytoscape_create_edit_toggle.js"></script>
	<script src="cytoscape_create_mode.js"></script>
	<script src="cytoscape_edit_mode.js"></script>
	<script src="node.js"></script>
	<script src="edge.js"></script>
	
	<!--import/export js-->
	<script src="cytoscape_import.js"></script>
	<script src="cytoscape_export.js"></script>
	
	<!--project js-->
	<script src="cytoscape_project.js"></script>
	
	<script src="jquery.blockUI.js"></script>
	
	
</head>

<body class="metro">

<div class="app-bar">
	<ul class="app-bar-menu">
		<li>
			<a href="#" class="dropdown-toggle">Project</a>
			<ul class="d-menu" data-role="dropdown">
				<li><a id="new_project">New</a></li>
			</ul>
		</li>
		
		<li>
			<a href="#" class="dropdown-toggle">File</a>
			<ul class="d-menu" data-role="dropdown">
				<li><a id="import_btn">Import</a></li>
				<li><a id="export_btn">Export</a></li>
				<li><a>Exit</a></li>
			</ul>
		</li>
		
		<li>
			<a class="dropdown-toggle" href="#">Windows</a>
            <ul class="d-menu" data-role="dropdown">
				<li><a id="mode_window"></a></li>
				<li><a id="tools_window"></a></li>
				<li><a id="log_window"></a></li>
				<li><a id="property_window"></a></li>
            </ul>
		</li>
	</ul>
</div>	



<!--
<form style="display: none" id="form" action="cyto2.php" method="POST">
	<input type="file" name="siffile" id="thefile">
</form>
-->

<div id="mode_window_box" title="Mode Window">
	<div data-group-type="one-state" data-role="group">
		<button style="width: 100%" class="toolbar-button active" id="create_mode_btn">Create</button>
		<button style="width: 100%; margin-top:20px" class="toolbar-button" id="edit_mode_btn">Edit</button>
	</div>
</div>

<div id="tools_window_box"  title="Tools Window">
	<div id="edit_tools_box">
		<ul class="inline-list icon-list">
		<li><span class="mif-cross"></span></li>
		<li><span class="mif-stack"></span></li>
		<li><span class="mif-bin"></span></li>
		<ul>
	</div>
</div>

<div id="log_window_box" title="Log Window">
	<div id="log_window_box_scroll" style="overflow: scroll; width:100%; height: 200px">
		Click to create
	</div>
</div>

<div id="property_window_box" title="Property Window">
	<div id="node_property_box">
			ID: <input id="node_id" type="text" value="" disabled><br>
			Name: <input id="node_name" type="text" value=""><br>
			<div>
				<span>background</span>
				<span title="Node background color">
					<input id="node_background_color" type="text" value="#ffffff" />
				</span>
				<span>
					<select id="node_background_opacity" name="node_background_opacity" title="background opacity">
						<option value="0">0%</option>
						<option value="0.1" >10%</option>
						<option value="0.3">30%</option>
						<option value="0.5">50%</option>
						<option value="0.8">80%</option>
						<option value="1" selected="selected">100%</option>
					</select>
				</span>
				<span title="Node background image">
					<label for="node_background_image">URL</label>
					<input id="node_background_image" type="text" value="" />
				</span>
			</div>
			<div>	
				<span>border</span>
				<span>
					<input id="node_border_width" name="node_border_width"></input>
				</span >
				<span title="Node border color">
					<input id="node_border_color" type="text" value="#000000" />
				</span>
				<span>
					<select id="node_border_opacity" name="node_border_opacity" title="border opacity">
						<option value="0">0%</option>
						<option value="0.1" >10%</option>
						<option value="0.3">30%</option>
						<option value="0.5">50%</option>
						<option value="0.8">80%</option>
						<option value="1" selected="selected">100%</option>
					</select>
				</span>
				<span class="node_tool_bar">
					<select id="node_border_style" name="node_border_style" title="set the border style for nodes" disabled>
						<option value="none" selected="selected">None</option>
						<option value="dotted" >dot</option>
						<option value="dashed">dashed</option>
						<option value="solid">solid</option>
						<option value="double">double</option>
						<option value="groove">groove</option>
						<option value="ridge">ridge</option>
						<option value="inset">inset</option>
						<option value="outset">outset</option>
					</select>
				</span >
			</div>
			<div class="group">	
				<span class="node_tool_bar">Shape</span>
				<span class="node_tool_bar">
					<select id="node_shape" name="node_shape" title="set the node shape" >
						<option id="ellipse" value="ellipse">ellipse</option>
						<option id="rectangle" value="rectangle" >rectangle</option>
						<option id="roundrectangle" value="roundrectangle">roundrectangle</option>
						<option id="triangle" value="triangle">triangle</option>
						<option id="square" value="square">square</option>
						<option id="pentagon" value="pentagon">pentagon</option>
						<option id="hexagon" value="hexagon">hexagon</option>
						<option id="heptagon" value="heptagon">heptagon</option>
						<option id="octagon" value="octagon">octagon</option>
					</select>
				</span >
				<span class="node_tool_bar">
					<select id="F" name="node_height" title="set the node height" >
						<option value="1">1</option>
						<option value="2" >2</option>
						<option value="3">3</option>
						<option value="5">5</option>
						<option value="8">8</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="30" selected="selected">30</option>
						<option value="40">40</option>
						<option value="60">60</option>
						<option value="80">80</option>
						<option value="100">100</option>
					</select>
				</span >
				<span class="node_tool_bar">
					<select id="node_width" name="node_width" title="set the node width" >
						<option value="1">1</option>
						<option value="2" >2</option>
						<option value="3">3</option>
						<option value="5">5</option>
						<option value="8">8</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="30" selected="selected">30</option>
						<option value="40">40</option>
						<option value="60">60</option>
						<option value="80">80</option>
						<option value="100">100</option>
					</select>
				</span >
			</div>	
	</div>
	
	<div id="edge_property_box">
		ID: <input id="edge_id" type="text" value="" disabled><br>
		Name: <input id="edge_name" type="text" value=""><br>
			<span>Source</span>
			<span>
				<select id="edge_source_arrow_shape">
					<option value="tee">tee</option>
					<option value="triangle" >triangle</option>
					<option value="square">square</option>
					<option value="circle">circle</option>
					<option value="diamond">diamond</option>
					<option value="none">none</option>
				</select>
			</span >
			<span>
				<input id="edge_source_arrow_color" type="text"/>
			</span>
		<div>
			<span>Target</span>
			<span>
				<select id="edge_target_arrow_shape">
					<option value="tee">tee</option>
					<option value="triangle" >triangle</option>
					<option value="square">square</option>
					<option value="circle">circle</option>
					<option value="diamond">diamond</option>
					<option value="none">none</option>
				</select>
			</span >
			<span title="edge target arrow color">
				<input id="edge_target_arrow_color" type="text">
			</span>
		</div>
		<div>
			<span>Line style</span>
			<span>
				<select id="edge_line_style">
					<option value="solid">solid</option>
					<option value="dotted" >dotted</option>
					<option value="dashed">dashed</option>
				</select>
			</span >
			<span>
				<input id="edge_line_color" type="text"/>
			</span>
			<span>
				<input id="edge_width" type="text"/>
			</span >
		</div>
	</div>
</div>

<div id="new_project_dialog" title="Select a canvas mode">
			<label class="input-control radio">
				<input type="radio" name="canvas_mode_selector" id="general_canvas">
				<span class="check"></span>
				<span class="caption">General</span>
			</label>
			<label class="input-control radio">
				<input type="radio" id="fuzzyTree_canvas"  name="canvas_mode_selector">
				<span class="check"></span>
				<span class="caption">Fuzzy Tree</span>
			</label>
			<div id="button-container" style="text-align: center">
				<button class="command-button icon-left warning" id="new_project_go">
					<span class="icon mif-rocket"></span>
					Go
				</button>
			</div>
</div>

<div id="cy">
</div>

<!--
<div id="tool-box">
  <div class="button-set" data-role="button-group">
    <button style="width: 100%" class="active" id="creation_mode">Creation Mode</button>
	<div id="creation-mode-tools">
		<i class="icon-tree-view"
		style="background: gray;
			   color: white;
			   padding: 10px;
			   margin: 5px;
			   cursor: pointer;"
			   ></i>
	</div>
    <button style="width: 100%; margin-top:20px" id="selection_mode">Selection Mode</button>
	<div id="selection-mode-tools">
			<i class="icon-cancel"
		style="background: gray;
			   color: white;
			   padding: 10px;
			   margin: 5px;
			   cursor: pointer;"
			   ></i>
			<i class="icon-copy"
		style="background: gray;
			   color: white;
			   padding: 10px;
			   margin: 5px;
			   cursor: pointer;"
			   ></i>
	</div>
  </div>
</div>
-->
<form id="import_form" style="display: none">
	<input type="file" id="file_selected" name="file_selected"/>
	<input type="submit" id="upload_file_submit"/>
</form>

</body>
</html>
