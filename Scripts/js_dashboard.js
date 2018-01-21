jQuery(function($) {
  var $bodyEl = $('body'),
      $sidedrawerEl = $('#sidedrawer');
  
  
  // ==========================================================================
  // Toggle Sidedrawer
  // ==========================================================================
  function showSidedrawer() {
    // show overlay
    var options = {
      onclose: function() {
        $sidedrawerEl
          .removeClass('active')
          .appendTo(document.body);
      }
    };
    
    var $overlayEl = $(mui.overlay('on', options));
    
    // show element
    $sidedrawerEl.appendTo($overlayEl);
    setTimeout(function() {
      $sidedrawerEl.addClass('active');
    }, 20);
  }
  
  
  function hideSidedrawer() {
    $bodyEl.toggleClass('hide-sidedrawer');
  }
  
  
  $('.js-show-sidedrawer').on('click', showSidedrawer);
  $('.js-hide-sidedrawer').on('click', hideSidedrawer);
  
  
  // ==========================================================================
  // Animate menu
  // ==========================================================================
  var $titleEls = $('strong', $sidedrawerEl);
  
  $titleEls
    .next()
    .hide();
  
  $titleEls.on('click', function() {
    $(this).next().slideToggle(200);
  });
});

//############################################################
// For the little triangle on the sections of the side menu
//############################################################

$(function()
{
    $('#multiple, #multiple2').click(function()
    {
        // alert($(this).attr('id'));
        var id = $(this).attr('id');
        var triangle = document.getElementById(id).getElementsByClassName("triangle")[0];
        var background = $(this).css("background-color");
        if(background == "rgb(66, 66, 66)")
        {
            triangle.innerHTML = '▾';
            $(this).css("background-color","#616161");
        }
        else
        {
            triangle.innerHTML = '◂';
            $(this).css("background-color","#424242");
        }

    });
});

//##############################################################
// For the favourite toggle (star in top-right corner of cards)
//##############################################################

$(function()
{
    $('.card_favourite, .card_not_favourite').click(function()
    {
        var fav = $(this).attr('class');
        fav = fav == "card_favourite" ? 1 : 0;
        var home_name = $("#where_location").text();
        var room_name = $(this).closest(".card").find("#room_name").text();
        var what = $(this).closest(".card").attr("what");
        if(what == "sensor")
        {
          var sensor_name = $(this).closest(".card").find("#sensor_name").text();
          var sensor_id = $(this).closest(".card").find("#sid").attr("sid");
        }
        else
        {
          var sensor_name = "";
          var sensor_id = "";
        }

        var this_element = $(this);
                 
        $.post("index.php?t=favourite",{isfavourite : fav, home_name : home_name, room_name : room_name, sensor_name : sensor_name, sensor_id : sensor_id, what : what}, function(result)
          {
            var token = 0;
            if(result.includes("/"))
            { 
              result = result.split("/");
              token = 1; 
              result = parseInt(result[0]);
            }
            else{ result = parseInt(result); }
            if(result == 0 || result == 1 && token == 0 || token == 1)
            {
              new_class = (result == 1 ? "card_favourite" : "card_not_favourite");
              this_element.attr('class', new_class);
              if(token == 1){ location.href = "index.php"; }
              else{ this_element.style.webkitTransform = ''; } 
            }
          });
        
    });
});


