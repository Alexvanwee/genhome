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

counter_triangle = 0;

$(function()
{
    $('#multiple, #multiple2').click(function()
    {
        // alert($(this).attr('id'));
        var id = $(this).attr('id');
        var triangle = document.getElementById(id).getElementsByClassName("triangle")[0];
        if(counter_triangle == 0)
        {
            triangle.innerHTML = '▾';
            counter_triangle = 1;
            $(this).css("background-color","#616161");
        }
        else
        {
            triangle.innerHTML = '◂';
            counter_triangle = 0;
            $(this).css("background-color","#424242");
        }

    });
    
});
