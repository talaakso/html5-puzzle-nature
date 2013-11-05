<!DOCTYPE html>
<html lang='en'>
 
<head>
	<meta charset="utf-8">
    
    <title>HTML 5 CANVAS PUZZLE DEMO - KINETIC JS</title>
    
    <meta name="description" content="HTML 5 CANVAS PUZZLE DEMO - KINETIC JS: Demo to show very simple way to produce puzzle/drag-and-drop user interfaces by using HTML 5 canvas element and Kinetic JS -library." />
	<meta name="keywords" content="puzzle,demo,html5,javascript,canvas,kinetic js,drag-and-drop,user interface, Tero Laakso,talaakso" />
	<meta name="author" content="Tero Laakso">
    
    <meta name="copyright" content="Tero Laakso">
    
    <link rel="icon" type="image/png" href="./gfx/apple_icon.png" /> 
    <link rel="apple-touch-icon" href="./gfx/apple_icon.png" />
    
    
	<meta name = "viewport" content = "initial-scale = 0.8, maximum-scale = 1.5, width = device-width" />
    <!--
    <meta name = "viewport" content = "initial-scale = 0.7, maximum-scale = 1.0, width = device-width" />
    -->
    <style type="text/css">
	
		* {
		  margin: 0;
		  padding: 0;
		  -webkit-text-size-adjust: none;
		  font-family:Arial, Helvetica, sans-serif;
		}
		
        body{
            margin:0px;
            overflow:hidden;
			background: #000;
        }
		
		.main_page{
			position: relative;
			width: 1040px;
			margin: 0px auto;
			
		}
		
        #container{
             z-index:1000;  
        }
		
		.ui_div
		{
			position: relative;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
			
			padding: 20px 20px 20px 20px;
			color: #fff;
			z-index:1000;
		}
		
		.thumb_img
		{
			position: absolute;
			top: 100px;
			right: 0px;
			
			border: none;
			padding: 5px 5px 5px 5px;
			background: #FFF;
			width:200px;
			
			z-index: 100;			
		}
		
		#endtext
		{
			color: #3C6;
			font-size:16px;
			padding: 0px 0px 5px 0px;
		}
		
		.demo_link
		{
			color: #9CF;
			text-decoration:none;
		}
		
		.score_tdH
		{
			font-size: 22px;
			padding: 0px 0px 10px 0px;
		}
		
		.score_td1
		{
			width: 175px;
			font-size: 12px;
			padding: 0px 0px 0px 0px;
			text-align: left;
		}
		
		.score_td2
		{
			width: 75px;
			text-align: right;
			font-size: 12px;
			padding: 0px 0px 0px 0px;
		}
		
		.info_div2
		{
			position: absolute;
			top:-650px;
			left:0px;
			
			width: 1000px;
			height: 460px;
			
			text-align: left;
			
			margin: 0px 0px 0px 0px;
			padding: 20px 20px 20px 20px;
			
			background: -webkit-linear-gradient( #fff, #777 );
			background: -moz-linear-gradient( #fff, #777 );
			background: -o-linear-gradient( #fff, #777 );
			background: -ms-linear-gradient( #fff, #777 );
			background: linear-gradient( #fff, #777 );
			
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border-radius: 5px;
				
			border: solid 2px #000;
			box-shadow: 2px 2px 5px rgba(0,0,0,0.75);
			
			z-index: 10000;
			
			display: inline;
		}
		
		.info_img2
		{
			position: absolute;
			top: 20px;
			right: 20px;
			border: none;
			
			background: #fff;
			margin: 0px 0px 0px 0px;
			padding: 5px 5px 5px 5px;
			
			width:300px;
			
			-khtml-box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
			-moz-box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
			box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
		}
	
		.info_sound_img
		{
			position: absolute;
			bottom: 10px;
			right: 10px;
			border: none;
		}
	
		.inner_info_div
		{
			position: absolute;
			top: 20px;
			left: 20px;
			border: none;
			
			width: 650px;
			height: 450px;
			
			background: #fff;
			margin: 0px 0px 0px 0px;
			padding: 5px 5px 5px 5px;
			
			-khtml-box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
			-moz-box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
			box-shadow:rgba(0,0,0,0.7) 0px 0px 6px;
		}
	
		.inner_text_div_1
		{
			position: absolute;
			top: 0px;
			left: 0px;
			border: none;
			
			width: 325px;
			
			margin: 0px 0px 0px 0px;
			padding: 10px 10px 10px 10px;
			
			font-family:Arial, Helvetica, sans-serif;
			font-size: 12px;
			
		}
	
		.inner_text_div_2
		{
			position: absolute;
			top: 0px;
			left: 340px;
			border: none;
			
			width: 200px;
			
			margin: 0px 0px 0px 0px;
			padding: 10px 10px 10px 10px;
			
			font-family:Arial, Helvetica, sans-serif;
			font-size: 16px;  
			
		}
		
		.time_text 
		{
			position:absolute;
			top:15px;
			left:830px;
			
			color:#fff; 
			font-size:12px;
		}
		
		.label_link
		{
			color: #3C6;
			text-decoration:none;
		}
		
		h2 {
			font-size: 24px;
			padding: 0px 0px 10px 0px;
		}
	
    </style>
    
    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="./js/kinetic-v4.6.0.min.js"></script>  
    <script type="text/javascript" src="./js/TweenMax.min.js"></script>
 
	<script type="text/javascript">
   
	var imageScr;
	var imageObj;
	var selImageObj;
	var piecesArray;
	var horizontalPieces;
	var verticalPieces;
	var totalPieces;
	var shuffleMax;
	var pieceOffset;
	var imageWidth;
	var imageHeight;
	var pieceWidth;
	var pieceHeight;
	var stage;
	var layer;
	
	var selX;
	var selY;
	var selURL;
	
	var startedGame;
	var selName;
	var selImage;

	var checkInterval;
	var inter;
	var puzzleTime;
	
	function startPuzzleGame()
	{
		puzzleTime = 0;
		startedGame = selName;
		shuffleImage(shuffleMax);
		inter = setInterval(checkGameVictory,checkInterval);
	}
	
	function showInfo(event) 
	{
		event.stopPropagation();
					
		var info = document.getElementById("info");
		infoPos = $("#info").position();
		infoY   = parseInt(infoPos.top)+1;
		TweenLite.to(info, 0.1, {y:infoY,autoAlpha:1,onComplete:showInfoDiv});
	}
	
	function showInfoDiv()
	{
		var info = document.getElementById("info");
		
		infoHeight = $("#info").height();
		topPos = - infoHeight;
		
		info.style.top = topPos + "px";
		
		TweenLite.to(info, 2, {y:infoHeight, ease:"Elastic.easeOut"});
	}
	
	function hideInfoDiv()
	{
		//$("#info"+idx).hide();
	}
	
	function hideInfo() 
	{
		var info = document.getElementById("info");
		
		infoHeight = $("#info").height();
		topPos = - infoHeight;
		
		$("#info").show();
		TweenLite.to(info, 1, {y:topPos, ease:"Cubic.easeOut",onComplete:hideInfoDiv});
	}

	function exportPuzzle()
	{
		if( layer != null ) {
			var config = {mimeType:"image/jpeg",quality:1};
			var layerURL = layer.toDataURL(config);
			window.open(layerURL,'_blank');
		}
	}
	
	function isEmpty(pString) {
		if (!pString || pString.length == 0) {
			return true;
		  }
			
		  return !/[^\s]+/.test(pString);
	}
	
	function checkVictory()
	{
		if( checkPuzzle() ) {
			alert("Congratulations! Image is now complete!");
		}
		else {
			alert("You still got some pieces missing!");
		}
	}
	
	function saveTop(selName, selImage, name, score)
	{
		<?php 
			echo "nO9xUwnSnfytL7AzuW = 'mIxY7aZiqPwDiEmsEfS';";
		?>		
												
		$.post('./save_scores.php', {selName:selName, selImage:selImage, name:name, score:score, nO9xUwnSnfytL7AzuW:nO9xUwnSnfytL7AzuW},
			function(data){
			
			if( data.success == true ) {
				 tmpstr  = data.info;
				 document.getElementById('toplist').innerHTML = tmpstr;
			}
			else {
				document.getElementById('toplist').innerHTML = "";
			}
							
		}, 'json');	
	}
	
	function checkGameVictory()
	{
		if( checkPuzzle() ) {
			if( inter != null ) {
				clearInterval(inter);
				inter = null;
			}
			
			var name = document.getElementById('player_name').value;
			
			if( !isEmpty(name) ) {
				if( !isEmpty(startedGame) ) {
					if( !isEmpty(selName) ) {
						if( selName == startedGame ) {
							
							score = puzzleTime;
							
							if( (score > 5) && (score < 2000) ) { 	
								saveTop(selName, selImage, name, score);
							}
						}
					}
				}
			}
			
			startedGame = "";
			window.setTimeout(showEndInfo,1500);
			
		}
		else {
			puzzleTime++;
			document.getElementById('time_div').innerHTML = "TIME: " + puzzleTime;
		}
	}
	
	function showEndInfo()
	{
		document.getElementById('endtext').innerHTML = "Congratulations! You finished with time " + puzzleTime;
		puzzleTime = 0;
		document.getElementById('time_div').innerHTML = "";
		showInfoDiv();	
	}
	
	function stopGame()
	{
		if( inter != null ) {
			clearInterval(inter);
			inter = null;
		}
		
		document.getElementById('time_div').innerHTML = "";
		puzzleTime = 0;	
	}
	
	function checkPuzzle()
	{
		if( piecesArray == null ) {
			return false;
		}
		
		if( piecesArray.length < 4 ) {
			return false;
		}
		
		var retval = true;
		
		for(kk=0;kk<piecesArray.length;kk++) {
			
			if( (kk != piecesArray[kk].idx) ) {
				retval = false;
				break;
			}
		}
	
		return retval;
	}
	
	function refresh()
	{
		iO = document.getElementById('thumbimage2');
		
		if(iO != null) {
		  if( inter != null ) {
		  	clearInterval(inter);
		    inter = null;
			document.getElementById('time_div').innerHTML = "";
			puzzleTime = 0;
		  }
		  drawImage(iO);
		}
	}
	
	function shuffleImage(m) 
	{
		var suffleArray = new Array();
		var shuffleBool = true;
		var sMax = 50000; 
				
		for(jj=0;jj<m;jj++) {
		  i = Math.floor(totalPieces*Math.random());
		  j = Math.floor(totalPieces*Math.random());
		  shuffleBool = true;
		  
		  while( (i == j) || (shuffleBool == true) ) {
		    i = Math.floor(totalPieces*Math.random());
			j = Math.floor(totalPieces*Math.random());
			shuffleBool = false;
			for(kk=0;kk<suffleArray.length;kk++) {
				
				if( kk>sMax ) {
				  return;				  
				}
				
				if( (suffleArray[kk] == i) || (suffleArray[kk] == j) ) {
					shuffleBool = true;
					break;
				}
			}
			
		  }
		 
		  suffleArray.push(i);
		  suffleArray.push(j);
		  shufflePieces(i,j, 1, 1, 0, Kinetic.Easings.EaseInOut);
		  
		}
	}

	function shufflePieces(m,n, durat, opac, rot, easy)
	{
		
		if( m >= totalPieces ) {
		  return;
		}
		
		if( n >= totalPieces ) {
		  return;
		}
		
		if( m == n ) {
		  return;
		}
		
		if( isNaN(durat) == true ) {
			durat = 1;	
		}
		
		if( isNaN(opac) == true ) {
		  opac = 1;
		}
		
		if( isNaN(rot) == true ) {
			rot = 0;	
		}
		
		if( easy == null ) {
		  easy = Kinetic.Easings.Linear;
		}
		
		var timg  = piecesArray[m];
		var timg2 = piecesArray[n];
		
		var timgI = m%horizontalPieces;
		var timgJ = parseInt(m/horizontalPieces);
		
		var timg2I = n%horizontalPieces;
		var timg2J = parseInt(n/horizontalPieces)
	 		
		piecesArray[m] = timg2;
		piecesArray[n] = timg;
				
		timg.tween = new Kinetic.Tween({
		  node: timg,
		  x: timg2I*(pieceWidth+pieceOffset),
		  y: timg2J*(pieceHeight+pieceOffset),
		  opacity: opac,
		  rotationDeg:rot,
		  easing: easy,
		  duration: durat
		});
		
		timg2.tween = new Kinetic.Tween({
		  node: timg2,
		  x: timgI*(pieceWidth+pieceOffset),
		  y: timgJ*(pieceHeight+pieceOffset),
		  opacity: opac,
		  rotationDeg:rot,
		  easing: easy,
		  duration: durat
		});
		
		timg.moveToTop();
		timg2.moveToTop();
		
		timg.tween.play();
		timg2.tween.play();	
		
	}
	
	function resize_image(image) {
       
		var iW = image.width;
		var iH = image.height;
		var iR = image.width/image.height;
		
		if( iH > 500 ) {
			iH = 500;
			iW = parseInt(iH*iR);
		}
		
		var mainCanvas = document.getElementById("resizecanvas");
        
		mainCanvas.width = iW;
        mainCanvas.height = iH;
        var ctx = mainCanvas.getContext("2d");
        ctx.drawImage(image, 0, 0, mainCanvas.width, mainCanvas.height);
        resizedImageObj = new Image();
		resizedImageObj.onload = function() {
			drawImage(this);
         }
		
		resizedImageObj.src = mainCanvas.toDataURL("image/jpeg");
			
    };
	
	function drawImage(imageObj) {
        piecesArray=new Array();
        		
		horizontalPieces = parseInt(selX);
        verticalPieces   = parseInt(selY);
		
		totalPieces = horizontalPieces*verticalPieces;
		pieceOffset = 0;
		
		shuffleMax       =  parseInt(totalPieces/2);
			
		imageWidth = imageObj.width;
		imageHeight = imageObj.height;
        pieceWidth = Math.floor(imageWidth/horizontalPieces);
        pieceHeight = Math.floor(imageHeight/verticalPieces);
		
		stage = new Kinetic.Stage({
            container: "container",
			width: imageObj.width,
            height: imageObj.height
        });
        layer = new Kinetic.Layer();
          for(i=0;i<verticalPieces;i++){
              for(j=0;j<horizontalPieces;j++){
                  var n = j+i*horizontalPieces;
                    
					piecesArray[n] = new Kinetic.Image({
                      image: imageObj,
                      crop:{
                        x: j*pieceWidth,
                        y: i*pieceHeight,
                        width: pieceWidth,
                        height: pieceHeight
                    },
                    x: j*(pieceWidth+pieceOffset),
                    y: i*(pieceHeight+pieceOffset),
					stroke: "#000000",
					strokewidth: 1,
                      width: pieceWidth,
                      height: pieceHeight,
                      draggable: true,
					  dragBoundFunc: function(pos) {
						  var newX = pos.x;
						  var newY = pos.y;
						  
						  if( newX < 0 ) {
						  	newX = 0;
						  }
						  
						  if( newY < 0 ) {
						  	newY = 0;
						  }
						  
						  if( newX > imageWidth ) {
						  	newX = imageWidth-pieceWidth;
						  }
						  
						  if( newY > imageHeight ) {
						  	newY = imageHeight-pieceHeight;
						  }
						  
						  return {
							x: newX,
							y: newY
						}
					  }
                });
				
				piecesArray[n].idx = n;
				
                piecesArray[n].on("mouseover", function(){
                      document.body.style.cursor = "pointer";
                });
                    piecesArray[n].on("mouseout", function(){
                      document.body.style.cursor = "default";
                    });
                piecesArray[n].on("dragstart", function(evt){
                        
						this.moveToTop();
						
						var mPos = this.getPosition();
						
						var mX = ((pieceWidth/2) + mPos.x )/pieceWidth;
        				var mY = ((pieceHeight/2) + mPos.y)/pieceHeight;
						
						mX = parseInt(mX);
						mY = parseInt(mY);
						
						if( mX < 0 ) {
						  mX = 0;
						}
						
						if( mY < 0 ) {
						  mY = 0;
						}
						
						if( mX >= horizontalPieces ) {
						  mX = horizontalPieces-1;
						}
						
						if( mY >= verticalPieces ) {
						  mY = verticalPieces-1;
						}
						
						var idx = mX + (mY*horizontalPieces);
						
						this.mX = mX;
						this.mY = mY;
						
                  });
				piecesArray[n].on("dragend", function(evt){
					//var mPos = stage.getMousePosition();
					//var mPos = stage.getPointerPosition();
					//var mPos = evt.targetNode.getPosition();
					var mPos = this.getPosition();
					var mX = ((pieceWidth/2) + mPos.x )/pieceWidth;
        			var mY = ((pieceHeight/2) + mPos.y)/pieceHeight;
				
					mX = parseInt(mX);
					mY = parseInt(mY);
					
					if( mX < 0 ) {
					  mX = 0;
					}
					
					if( mY < 0 ) {
					  mY = 0;
					}
					
					if( mX >= horizontalPieces ) {
					  mX = horizontalPieces-1;
					}
					
					if( mY >= verticalPieces ) {
					  mY = verticalPieces-1;
					}
					
					var indx = mX + (mY*horizontalPieces);
					var timg = piecesArray[indx];
					
					var indxold = this.mX + (this.mY*horizontalPieces);
					var timgold = piecesArray[indxold];
					
					piecesArray[indx]  = timgold;
					piecesArray[indxold] = timg;
					
					timg.tween = new Kinetic.Tween({
					  node: timg,
					  x: this.mX*pieceWidth,
					  y: this.mY*pieceHeight,
					  easing: Kinetic.Easings.EaseInOut,
					  duration: 1
				  	});
					
					this.tween = new Kinetic.Tween({
					  node: this,
					  x: mX*pieceWidth+pieceOffset,
					  y: mY*pieceHeight+pieceOffset,
					  easing: Kinetic.Easings.EaseInOut,
					  duration: 1
				  	});
					
					timg.tween.play();					
					this.tween.play();
					  
                });                
                   layer.add(piecesArray[n]);
            }
         }
        stage.add(layer);
    }
	
	function parseTop(selName)
	{
		<?php 
			echo "mN9d6XiqHflPeSf = 'mIeW2kjdTb6cIU';";
		?>
												
		$.post('./print_scores.php', {selName:selName, mN9d6XiqHflPeSf:mN9d6XiqHflPeSf},
			function(data){
			
			if( data.success == true ) {
				 tmpstr  = data.info;
				 document.getElementById('toplist').innerHTML = tmpstr;
			}
			else {
				document.getElementById('toplist').innerHTML = "";
			}
							
		}, 'json');	
	}
	
	function parseSelect(selVal)
	{
		var selValArr = selVal.split(";");
		
		selX = parseInt(selValArr[2]);
		selY = parseInt(selValArr[3]);
		
		selName  = selValArr[0];
		selImage = selValArr[1];
		startedGame = "";
		
		var retVal = selValArr[1];
		
		parseTop(selName);
		
		document.getElementById('infoimg1').src = selImage;
		return retVal;
	}
	
    function init_puzzle(imlocation) {
		
		var d = new Date();
		
		checkInterval = 1000;
		
		imageScr = imlocation;
		if( imlocation == null ) {
		  imageScr = "./gfx/Rapadalen.jpg";
		}
		
		document.getElementById('thumbimage').src  = imageScr;
		
		selImageObj = new Image();
		
		selImageObj.onload = function(){			
			drawImage(this);
         }
        
		selImageObj.src = imageScr;
	
		//document.getElementById('thumbimage2').src = imageScr;
		
     }
	 
	 function changeHandler(th)
	 {
		 stopGame();
		 startedGame = "";
		 document.getElementById('endtext').innerHTML = "";
		 selURL = parseSelect(th.value);
		 init_puzzle(selURL);
	 }
	 
	 $(function() {
		selX     = 4;
		selY     = 4;
		selName  = "Rapadalen";
		selImage = "./gfx/Rapadalen.jpg";
		
		document.getElementById('infoimg1').src = selImage;
		parseTop(selName); 
		init_puzzle(null);
	}); 
		
    </script>
</head>
 
<body>
    
    <div class='main_page'>
    
        <canvas id='resizecanvas' style='display:none;'></canvas>
        
        <div id="container"></div>
        
        <img id='thumbimage' class='thumb_img' alt='' />
    
    	<img src='./gfx/info.png' onmouseover="this.style.cursor='pointer';" onmouseout="this.style.cursor='default';" onclick="stopGame();showInfo(event);"
      style='position:absolute;top:5px;right:5px;' alt='' />
        
        <div id='time_div' class='time_text'></div>
        
        <div id="info" class="info_div2" onmouseover="this.style.cursor='pointer';" onmouseout="this.style.cursor='default';" onClick="hideInfo();" >
  	     
            <img id='infoimg1' class="info_img2" src="./gfx/puzzle-info-1.jpg" alt="Rapadalen" title="Rapadalen" />
            
            <div class="inner_info_div">
                <div class="inner_text_div_1">
                    <h2>HTML 5 PUZZLE</h2>
                    
                    Have fun experimenting with this demo!
                    
                    <br /><br />
                    
                <div class='form_div' onClick="event.stopPropagation();" >
                
                        <form>
                        PLAYER NAME: <input id='player_name' name='player_name' style='width:150px;' type='text' /><br /> 
                         
                        SELECT IMAGE:
                        <select onchange='changeHandler(this);' id='select_image' name='select_image'>
                            <option value='Rapadalen;./gfx/Rapadalen.jpg;4;4'>Rapadalen</option>
                            <option value='Sarek;./gfx/Sarek.jpg;4;4'>Sarek</option>
                            <option value='Skierfe;./gfx/Skierfe.jpg;5;5'>Skierfe</option>
                            <option value='Kebnats;./gfx/Kebnats.jpg;5;5'>Kebnats</option>
                            <option value='Tjahkkelij;./gfx/Tjahkkelij.jpg;5;5'>Tjahkkelij</option>
                            <option value='Utsjoki Church Yard;./gfx/Utsjoen_kirkkotuvat.jpg;4;5'>Utsjoki</option>
                            <option value='Viburnum opulus;./gfx/Koiranheisi.jpg;6;6'>Viburnum opulus</option>
                            <option value='Syringa vulgaris;./gfx/Pihasyreeni.jpg;6;6'>Syringa vulgaris</option>
                            <option value='Prunus padus;./gfx/Tuomi.jpg;7;7'>Prunus padus</option>
                            <option value='Scilla siberica;./gfx/idansinililja.jpg;7;7'>Scilla siberica</option>
                            <option value='Nymphaea alba;./gfx/lumme.jpg;7;7'>Nymphaea alba</option>    
                        </select><br />
                        
                        </div>
                        <br />
                        
                        <input type="button" style="display:none;" value="refresh" onmouseover="this.style.cursor='pointer';" onmouseout="this.style.cursor='default';" onClick="refresh();" />
                        <input type="button" value="PLAY" onmouseover="this.style.cursor='pointer';" onmouseout="this.style.cursor='default';" onClick="startPuzzleGame();" />
                        
                        <input type="button" value="shuffle" style="display:none;" onClick="shuffleImage(shuffleMax);" />
                        <input type="button" value="check" style="display:none;" onClick="checkVictory();" />
                        <input type="button" value="export JPG (NOT IE)" style="display:none;" onClick="exportPuzzle();" />
                        
                    </form>  
                    
                    <br /><br />
                    
                    <div id='endtext'></div>
                    <div id='toplist'></div>        
                    
                     
                </div>
                
                <div class="inner_text_div_2">
                
                    <h2>DEMOS</h2>
                    <a class="label_link" href="http://www.talaakso.fi/html5-puzzle-nature/" onclick="event.stopPropagation();" target="_blank" >NATURE PUZZLE</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/html5-palapelit-linnut/" onclick="event.stopPropagation();" target="_blank" >LINTUPALAPELIT</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/html5-palapelit-luonto/" onclick="event.stopPropagation();" target="_blank" >LUONTOPALAPELIT</a><br />   
                    <a class="label_link" href="http://www.talaakso.fi/html5-memorygame/" onclick="event.stopPropagation();" target="_blank" >MEMORY GAME</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/html5-memorygame-2/" onclick="event.stopPropagation();" target="_blank" >MEMORY GAME 2</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/html5-turning-cards-demo/" onclick="event.stopPropagation();" target="_blank" >TURNING CARDS</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/suomi/ohjelmointi/JavaScript/imagegallery2/index.php" onclick="event.stopPropagation();" target="_blank" >IMAGE GALLERY</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/imagegallery/imagegallery.php" onclick="event.stopPropagation();" target="_blank" >IMAGE GALLERY 2</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/luontovihko/luontovihko-2013.php" onclick="event.stopPropagation();" target="_blank" >NATURE BLOG</a><br />
                    <a class="label_link" href="http://www.talaakso.fi/html5-cube" onclick="event.stopPropagation();" target="_blank" >HTML 5 CUBE</a><br /><br />
                    
                    <h2>PROJECTS</h2>
                    <a class="label_link" href="http://www.e-girji.net" onclick="event.stopPropagation();" target="_blank" >www.e-girji.net</a>
                    <a class="label_link" href="http://www.imotion.fi" onclick="event.stopPropagation();" target="_blank" >www.imotion.fi</a>
                    <a class="label_link" href="http://www.virtuoosi.net" onclick="event.stopPropagation();" target="_blank" >www.virtuoosi.net</a>
                    
                </div>
        
        </div>
      </div>
    
    </div>
    
</body>
</html>
