$(function()
{
	$("button").click(function() 
	{
		window.location.assign("/Genhome/index.php");
	});

	$("#idForm").on("submit",function(e) 
	{
		e.preventDefault();
		// the script where the form input is processed
	    var url = "/Genhome/Controllers/c_registration.php";

	    $.ajax(
	    {
           type: "POST",
           url: url,
           data: $("#idForm").serialize(), // serializes the form's elements.
           beforeSend: function()
           {
        		var load = '<div class="loading" id="loading">\
					<div class="loading-bar"></div>\
					<div class="loading-bar"></div>\
					<div class="loading-bar"></div>\
					<div class="loading-bar"></div>\
				</div>';
				var original = $("#idForm").replaceWith(load);
           }
	    })
	    .done(function(data)
	    {
    		$("#loading").delay(30000).replaceWith("<h1>Success !<h1>");
	    });
	    e.preventDefault();
 
	});
});
