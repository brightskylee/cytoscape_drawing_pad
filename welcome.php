<html>
<head>
	<link href="metro/build/css/metro.css" rel="stylesheet">
	<link href="metro/build/css/metro-icons.css" rel="stylesheet">
    <link href="metro/docs/js/prettify/prettify.css" rel="stylesheet">

	
	<!-- Metro UI CSS JavaScript plugins -->

	<script src="metro/docs/js/jquery-2.1.3.min.js"></script>
    <script src="metro/build/js/metro.js"/></script>
	<script src="metro/docs/js/docs.js"/></script>
</head>
<style>
body, html {
	background: url("http://i.ytimg.com/vi/GnHY70HOqmk/maxresdefault.jpg")
}

#container {
	position: fixed;
	width: 50%;
	height: 50%;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%); 
}

#content {
	width: 100%;
	height: 100%;
	background: white;
	opacity: 0.9;

}

#content p {
	display: block;
	height: 20%;
	text-align: center;
	font-style: italic;
	font-size: 30px;
	
}

div#content label.input-control.radio{
	display: block;
	width: 20%;
	margin-left: auto;
	margin-right: auto;
}

#button-container {
	text-align: center;
}

#content button.command-button.icon-left.warning {
	width: 20%;
	text-align: center;
	margin-top: 80px;
}

</style>

<script>
 
function go(){
	if(document.getElementById("general_canvas").checked){
		window.location = "general.php";
	}
	else if(document.getElementById("fuzzyTree_canvas").checked){
		window.location = "fuzzyTree.php";
	}
	else{
		alert("Please select a canvas mode to begin");
	}
}

</script>

<body>
<div id="container">
	<div id="content">
		<p><strong>Please select a canvas mode to begin</strong></p>
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
			<div id="button-container">
				<button class="command-button icon-left warning" onclick="go()">
					<span class="icon mif-rocket"></span>
					Go
				</button>
			</div>
	</div>
</div>
</body>
</html>
