$(function()
{
  $('#emailForm').submit(function(e)
 {
     $.post("index.php?t=forgetPassword",$('#emailForm').serialize(), function(result)
         {
           result = parseInt(result);
           if(result == 0)
           {
             alert("Try later");
           }
         });
 });
});
