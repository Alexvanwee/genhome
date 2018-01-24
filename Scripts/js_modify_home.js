$(function()
{
	$('#home_name')
	    .data("oldValue",'')
	    .bind('input propertychange', function() 
	    {
	        var newValue = $(this).val();
	        
	        if (!isValid(newValue))
	        {
	            $(this).shake(3,4,400);
	            return $(this).val($(this).data('oldValue'));
	        }
	        return $(this).data('oldValue',newValue)
	    });

	 $("#idForm").on("submit",function(e) 
	{
	    $.post("index.php?t=message",$('#idForm').serialize(), function(result)
          {
          	result = parseInt(result);
          	if(result == 0)
          	{
          		$("#error").text("An error occured, please try again later...");
          	}
          });
	});
});

function isValid(str)
{
    return !/[~`!#$%\^&*=\\+\.µ£¤²-_°()[\]\\;,/@{}|\\":<>\?]/g.test(str);
}

jQuery.fn.shake = function(intShakes, intDistance, intDuration) 
{
    this.each(function() 
    {
        $(this).css("position","relative");
        for (var x=1; x<=intShakes; x++) 
        {
            $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
            .animate({left:intDistance}, ((intDuration/intShakes)/2))
            .animate({left:0}, (((intDuration/intShakes)/4)));
        }
    });
    return this;
};
