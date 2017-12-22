<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<div id="cookieChoiceInfo" style="position: fixed; width: 100%; background-color: rgba(238, 238, 238, 0.9); margin: 0px; left: 0px; bottom: 0px; padding: 4px; z-index: 1000; text-align: center;">
		<div style="padding-right: 50px;">
			<span>Cookies help us deliver our services. By using our services, you agree to our use of cookies.</span>
			<!-- <a href="https://joaoapps.com/more-info-cookies/" target="_blank" style="margin-left: 8px;">Learn more</a> -->
			<a id="cookieChoiceDismiss" href="#" style="margin-left: 24px;">Got it</a>
		</div>
		<!-- <a id="cookieChoiceDismissIcon" href="#" style="width: 50px; height: 100%; background-size: 20px; display: inline-block; position: absolute; right: 0px; top: 0px; background-position: 34% 50%; background-color: rgba(204, 204, 204, 0.6); background-repeat: no-repeat; background-image: url(&quot;data:image/png;base64,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&quot;);">
			
		</a> -->
	</div>

	<!-- Gros lien = la croix pour fermer -->


	<script type='text/javascript' src='/Genhome/Scripts/js_cookiechoices.js'></script>

	<script type="text/javascript">
		(function()
		{
			var cookieBar=function(){
				cookieChoices.showCookieBar({linkHref:'https://joaoapps.com/more-info-cookies/',dismissText:'',position:'bottom',cookieText:'',linkText:'',language:'en'})
			};
			if(document.addEventListener)
			{
				document.addEventListener('DOMContentLoaded',cookieBar);
			}
			else
			{
				document.attachEvent('onreadystatechange',function(event){
						if(document.readyState==="complete")
						{
							cookieBar();
						}
					});
			}
		})();

	</script>










</html>