<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
    
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    
    <title>PUZZLE ADMIN</title> 
    
    <link rel="icon" type="image/png" href="http://www.talaakso.fi/suomi/pics/talaakso-shortcut-icon.png" /> 
	<link rel="apple-touch-icon" href="http://www.talaakso.fi/suomi/pics/talaakso-apple-icon.png" />
	
    <link rel="stylesheet" type="text/css" media="screen" href="./jqGrid/css/jquery-ui-1.8.1.custom.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="./jqGrid/css/ui.jqgrid.css" />
	
    <meta name="copyright" content="Tero Laakso">
    
	<script language="javascript" type="text/javascript" src="./jqGrid/js/jquery-1.5.2.min.js"></script>
  	<script type="text/javascript" language="javascript" src="./jquery/jquery.alerts.js"></script>
	<script src="./jqGrid/js/i18n/grid.locale-fi.js" type="text/javascript"></script>
	<script src="./jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
   
	<script language="javascript" type="text/javascript">
	
		var muokkaaBool  = false;
	
		function poistaTmp() {

			$.post('del_ny8jbtsS.php', {upload: true},
				function(data){
					
					if( data.success == true ) {
					  htmlstr  = data.info;
					  $('#infoDiv').html(htmlstr);
					}
					else {
					  htmlstr  = data.info;
					  $('#infoDiv').html(htmlstr);
					}
					
					
			}, 'json');
		}
		
		function onErrorServer(rowid, result){
 		   alert(rowid +" —> "+result);
		} 
			
		$(function() {	 	
			
			jQuery("#rowed1").jqGrid({ 
				url:'server_dbase.php?nd='+new Date().getTime(), 
				datatype: "json", 
				colNames:['id', 'status', 'gameid', 'gameimage', 'score', 'name', 'modified'], 
				colModel:[ 
				{name:'id',index:'id', width:70,sortable:false,editable:false}, 
				{name:'status',index:'status', width:70,sortable:false,editable:true,edittype:"select",editoptions:{value:"1:1;0:0"}},
				{name:'gameid',index:'gameid', width:70,sortable:false,editable:true},
				{name:'gameimage',index:'gameimage', width:70,sortable:false,editable:true},
				{name:'score',index:'score', width:70,sortable:false,editable:true},
				{name:'name',index:'name', width:70,sortable:false,editable:true},
				{name:'modified',index:'modified', width:70,align:"left",sortable:false,editable:false} ], 
				rowNum:50, 
				rowList:[50,100,250,1000,2500], 
				pager: jQuery('#prowed1'), 
				sortname: 'id', 
				viewrecords: true, 
				sortorder: "asc",
				multiselect: true, 
				width: 1400,
				height: 400, 
				editurl: "edit_dbase.php", 
				caption: "ADMIN HISCORES" 
			}); 
				
			jQuery("#rowed1").jqGrid('navGrid',"#prowed1",{edit:false,add:true,del:true});
			
			jQuery("#ed1").click( function() { 
			
			
				if ( muokkaaBool == false ) {
				  rowIDs = $('#rowed1').jqGrid('getDataIDs');
				
				  if( (rowIDs!=null) ) {
				    arrayLen = rowIDs.length;
				  }
				  else {
				    arrayLen = 0;
				  }
				
				  for(i=0;i<arrayLen;i++) {
				    jQuery("#rowed1").jqGrid('editRow',rowIDs[i]); 
				  }
				  
				  muokkaaBool   = true; 
				  jQuery("#ed1").val("Peruuta muutos");
				
				  jQuery("#sved1").attr("disabled",false); 
				}
				else {
				  rowIDs = $('#rowed1').jqGrid('getDataIDs');
				
				  if( (rowIDs!=null) ) {
				    arrayLen = rowIDs.length;
				  }
				  else {
				    arrayLen = 0;
				  }
				
				  for(i=0;i<arrayLen;i++) {
				    jQuery("#rowed1").jqGrid('restoreRow',rowIDs[i]); 
				  }
				  
				  muokkaaBool   = false; 
				  jQuery("#ed1").val("Muokkaa taulukkoa");
				  jQuery("#sved1").attr("disabled",true); 
				}
				  //this.disabled = 'true';
				
			});
			
			jQuery("#sved1").click( function() {
				rowIDs = $('#rowed1').jqGrid('getDataIDs');
			
				if( (rowIDs!=null) ) {
				  arrayLen = rowIDs.length;
				}
				else {
				  arrayLen = 0;
				}
				
				for(i=0;i<arrayLen;i++) { 
					jQuery("#rowed1").jqGrid('saveRow',rowIDs[i]); 
				}
				
				jQuery("#rowed1").trigger("reloadGrid"); 
				jQuery("#sved1").attr("disabled",true); 
				jQuery("#ed1").attr("disabled",false); 
				jQuery("#ed1").val("Muokkaa taulukkoa");
				muokkaaBool   = false; 
			});
			
			jQuery("#pr1").click(function(){
				rowIDs = jQuery("#rowed1").jqGrid('getGridParam','selarrrow');
				
				if( (rowIDs.length!=null) ) {
				  if( rowIDs.length == 0 ) {
				    alert("Choose the rows to be deleted!");
				  }
				  else {
				    arrayLen = rowIDs.length;			
				    jQuery("#rowed1").jqGrid('delGridRow',rowIDs,{reloadAfterSubmit:true}); 	
				  }
				}
				else {
				  alert("Choose the rows to be deleted!");   
				}
			});
			
			jQuery("#excel1").click(function(){ 
			  
			  rowIDs = jQuery("#rowed1").jqGrid('getGridParam','selarrrow'); 	
				
			  $.post('grid_to_csv.php', {rowIDs: rowIDs},
						function(data){
							
							if( data.success == true ) {
							  htmlstr  = $('#infoDiv').html() + "<br />Link to CSV-file: ";
							  htmlstr += "<a href=\"" + data.filename + "\" target=\"_blank\" >" + data.filename + "</a>&nbsp;&nbsp;&nbsp; (<a href=\"#\" onclick=\"poistaTmp();\">Delete tempopary files</a>)<br />";
							  $('#infoDiv').html(htmlstr);
							}
							else {
							   htmlstr  = "<span style=\"color:#F00;\">Creation of CSV-file failed!</span><br />";
							   $('#infoDiv').html(htmlstr);
							}
							
							
					}, 'json');	
				
			});
			
			jQuery("#kopioi").click(function(){ 
			  
			  $.post('varmuuskopio.php', {upload: true},
						function(data){
							
							if( data.success == true ) {
							  htmlstr  = data.info;
							  $('#infoDiv').html(htmlstr);
							}
							else {
							  htmlstr  = data.info;
							  $('#infoDiv').html(htmlstr);
							}
									
					}, 'json');	
				
			});
			
	}); 
	 
    </script>
    
    <style>
		
		a {text-decoration: none; }
		li {
			font-family:Arial, Helvetica, sans-serif;
			font-size: 10px;
		}
		
		.ui-li .ui-btn-inner a.ui-link-inherit, .ui-li-static.ui-li {
			padding-right: 5px;
		}
		
		.custom_header
		{
			background:#0099CC;
			margin-bottom: 0px;
			text-align: center;
		}
		
		.inputForm:
		{
			padding: 0px 0px 0px 0px;
			margin: 0px 0px 0px 0px;
		}
		
		.custom_content:
		{
			padding: 0px 0px 0px 0px;
			margin: 0px 0px 0px 0px;
			width: 400px;
		}
		
		#infoDiv
		{
			margin: 20px 20px 20px 0px;
			padding: 0px 0px 0px 0px;
			font-family:Arial, Helvetica, sans-serif;
			font-size:14px;
		}
		
		#pageDiv 
		{
			width:1400px;
			text-align: center;
			margin: 0px auto 0px auto;
			background: #fff;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
		}
		
		table {
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
		}
		
		#copyDiv 
		{
			float: right;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
		}
		
		#buttonDiv
		{
		
		}
		
		#infoDiv
		{
			
		}
		
		#footerDiv
		{
			text-align: left;
			background: #fff;
		}
		
		#copyDiv2 
		{
			float: right;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
		}
		
		#footerDiv2
		{
			text-align: left;
			background: #fff;
		}
		
	</style>

</head>

<body style="margin:0px 0px 0px 0px;padding: 0px 0px 0px 0px;" >	

<div id="pageDiv">
	<img style="border:none;margin:0px 0px 0px 0px;padding: 0px 0px 0px 0px;" src="../gfx/talaakso-banner-1400px.jpg" alt="" />

	<table id="rowed1"></table> 
	
    <div id="prowed1"></div> <br /> 
    
    <div id="footerDiv">
    	<div id="buttonDiv">
    		<input type="button" id="ed1" vtitle="Muokkaa taulukkoa" value="Muokkaa taulukkoa" /> 
    		<input type="button" id="sved1" disabled='true' title="Tallenna muutokset" value="Tallenna muutokset" /> 
     		<input type="button" id="pr1"  title="Poista valitut rivit" value="Poista valitut rivit" />
      		<input type="button" id="excel1"  title="Tulosta valitut rivit (.csv)" value="Tulosta valitut rivit (.csv)" />
            <input type="button" id="kopioi"  title="Varmuuskopioi tietokanta" value="Varmuuskopioi tietokanta" />
    	</div>  
      
      	<div id="infoDiv"></div>
   		
         <div id="copyDiv">
    		&copy; 2013 Tero Laakso  	
    	</div> 
          
    </div> 
    
   
</div>	

</body>
</html>



