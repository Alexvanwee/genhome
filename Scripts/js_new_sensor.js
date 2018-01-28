$(function()
{
  $(".delete_button").click(function(){
          // var home_name = "";
          var sensor_name = $(this).parent().parent().find("#table_sensor_type").text();
          var sensor_index = $(this).parent().parent().attr("sid");
          var str = 'Are you sure you want to delete the sensor : '+sensor_name+' ?';
          var token = 0;
          var confirmed = 0;
          if (confirm(str)) 
          {
              confirmed = 1;
          } 
          if(confirmed == 1)
          {
              sensor_index = parseInt(sensor_index);
              
              $.post("index.php?t=delete_sensor",{sensor_index : sensor_index, sensor_name : sensor_name}, function(result)
              {
                result = parseInt(result);
                if(result == 0)
                {
                  $("#error").text("Couldn't delete the sensor, please try again later...");
                }
                // else{ token = 1; }
              });
          }
      });

	 $("#sensorForm").on("submit",function(e) 
	 {
	    $.post("index.php?t=new_sensor",$('#sensorForm').serialize(), function(result)
          {
          	result2 = parseInt(result);
          	if(result2 == 1)
          	{
          		  token = 1;
          	}
            else
            {
                alert(result);
            }
          });
	 });
});

function refresh_page(){ location.href = "index.php"; }

