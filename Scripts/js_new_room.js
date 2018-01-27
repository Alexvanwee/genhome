$(function()
{
  $(".delete_button").click(function(){
      // var home_name = "";
      var home_name = $(this).parent().parent().find("#table_room_name").text();
      var home_index = $(this).parent().parent().attr("rid");
      var str = 'Are you sure you want to delete the room : '+room_name+' ?';
      str += '\n It will also delete all the sensors linked to it.';
      // var token = 0;
      var confirmed = 0;
      if (confirm(str)) 
      {
          confirmed = 1;
      } 
      if(confirmed == 1)
      {
          room_index = parseInt(room_index);
          
          $.post("index.php?t=delete_room",{room_index : room_index, room_name : room_name}, function(result)
          {
            result = parseInt(result);
            if(result == 0)
            {
              $("#error").text("Couldn't delete the room, please try again later...");
            }
          });
      }
  });

function refresh_page(){ location.href = "index.php"; }

	$('#room_name')
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

	 $("#roomForm").on("submit",function(e) 
	 {
      var token = 0;
	    $.post("index.php?t=new_room",$('#roomForm').serialize(), function(result)
          {
          	result = parseInt(result);
          	if(result == 1)
          	{
          		  token = 1;
          	}
            else
            {
                $("#error").text(result);
            }
          });
        if(token==1){ location.href = "index.php"; }
	});
});

function isValid(str)
{
    return !/[~`!#$%\^&*=\\+\.µ£¤²\-\_\°()[\]\\;,/@{}|\\":<>\?]/g.test(str);
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
