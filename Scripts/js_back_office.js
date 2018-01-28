$(function()
{
  $(".delete_button").click(function(){

      var member_name = $(this).parent().parent().find("#table_member_firstname").text();
      var member_lastname = $(this).parent().parent().find("#table_member_lastname").text();
      var member_index = document.getElementById('mid').value;
      var str = 'Are you sure you want to delete the member : '+member_name+' '+member_lastname+' ?';

      var token = 0;
      var confirmed = 0;
      if (confirm(str))
      {
          confirmed = 1;
      }
      if(confirmed == 1)
      {
          member_index = parseInt(member_index);

          $.post("../Controllers/c_delete_member.php",{member_index : member_index, member_name : member_name}, function(result)
          {
            result = parseInt(result);
            if(result == 0)
            {
              $("#error").text("Couldn't delete the member, please try again later...");
            }
          });
          window.location.href = '../Views/dashboard_test.php';
      }
  });



  $(".change_statu").click(function(){
    var member_statu = $(this).parent().parent().find("#change").text();
    var str = 'Are you sure you want to delete the member : '+member_statu+'  ?';

  });

  $('#serialForm').submit(function(e)
 {
     $.post("../Controllers/c_new_sold.php",$('#serialForm').serialize(), function(result)
         {
           result = parseInt(result);
           if(result == 0)
           {
             alert("Try later");
           }
         });
 });


});
function refresh_page(){ location.href = "index.php"; }





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
