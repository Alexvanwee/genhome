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

