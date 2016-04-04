<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body class="body">
		<div id="baseDiv" class="baseDiv">
		</div>
		<style>
			.body
			{
				background: #404040;
			}
			.baseDiv
			{
				
				width: 100%;
				height: 100%;
			}
			*:active,
			*:hover
			{
			  cursor: pointer;
			}
		</style>
		<script>
			function keyStroke(event)
			{
				if(event.keyCode == 13)
				{
					processPage();
				}
			}
			
			function processPage()
			{
				var pageCode;
				
				if (typeof getPageCode == 'function')
				{ 
					pageCode = getPageCode();
				}
				else
				{
					pageCode = 'new';
				}
				 
				
				var strURL = 'http://odonen.ddns.net:7737/pageSubmit.php?pc=' + pageCode;
				
				if(typeof urlQueryStrings == 'function')
				{
					strURL = urlQueryStrings(strURL, pageCode);
				}
				
				$.ajax
				({
					url: strURL,
					cache: false,
					data: 
					{
						dataType: "html",
						returnFormat: "html"
					},
					success: function(data)
					{
						if(typeof responseAction == 'function')
						{
							responseAction(data);
						}
						else
						{
							$('#baseDiv').append(data);
						}
					}
				});
			}
			
			processPage();
		</script>
	</body>
</html>