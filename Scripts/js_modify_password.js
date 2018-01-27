$(function()
{
  $('#form2').submit(function(e)
 {
     $.post("index.php?t=newpassword",$('#form2').serialize(), function(result)
         {
           result = parseInt(result);
           if(result == 0)
           {
             alert("Try later");
           }
         });
 });
});
