$(function()
{
    $('#form1').submit(function(e)
    {
        var token = 0;                 
        $.post("index.php?t=addUser",$('#form1').serialize(), function(result)
          {
            console.log(result);
            if(result.indexOf("/")<0)
            {
                // result = result.split("/");
                result = parseInt(result);
                if(result == 1)
                {
                    closeModal();
                }
                else if(result==0)
                {
                    $("#errormsg").text("There was an error");
                }
            }
            else if(result.indexOf("/")>0)
            {
              result = result.split("/");
              var msg = result[1];
              alert("This is the password for the user, please note it carefully : "+msg);
              closeModal();
              token = 1;
            }
          });
          // e.preventDefault(); 
          if(token == 1){ location.href = "index.php?t=test"; }       
    });
});

$(function(){
  $('#buttonadd').click(function(e){
      e.preventDefault();
      openModal();
    });
});


$(function()
{
	$('#name,#lastname')
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
	    
	$('#email')
	    .data("oldValue",'')
	    .bind('input propertychange', function() 
	    {
	        var newValue = $(this).val();
	        
	        if (!isValid2(newValue))
	        {
	            $(this).shake(3,4,400);
	            return $(this).val($(this).data('oldValue'));
	        }
	        return $(this).data('oldValue',newValue)
	    });
});

function openModal(){
     document.getElementById("modal").style.top="240px";};

function closeModal(){
     document.getElementById("modal").style.top="-600px";
  }

function isValid(str)
{
    return !/[~`!#$%\^&*=\\+\.µ£¤²°()[\]\\;,/@{}|\\":<>\?]/g.test(str);
}
function isValid2(str)
{
    return !/[~`'!#$%\^&*+=\\µ£¤²°()[\]\\;,/{}|\\":<>\?]/g.test(str);
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