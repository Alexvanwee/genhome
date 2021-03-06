$(function()
{
    $('#first_name , #last_name , #address')
    .data("oldValue",'')
    .bind('input propertychange', function() 
    {
        var newValue = $(this).val();
        
        if ( !isValid(newValue) )
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
    $('#serial')
    .data("oldValue",'')
    .bind('input propertychange', function() 
    {
        var newValue = $(this).val();
        
        if (newValue.match(/[^A-Za-z0-9]/))
        {
            $(this).shake(3,3,300);
            return $(this).val($(this).data('oldValue'));
        }
        return $(this).data('oldValue',newValue)
    });

    // $("#idForm").on("submit",function(e) 
    // {
    //     e.preventDefault();
    //     // the script where the form input is processed
    //     var url = "/Genhome/Controllers/c_registration.php";

    //     $.ajax(
    //     {
    //        type: "POST",
    //        url: url,
    //        data: $("#idForm").serialize(), // serializes the form's elements.
    //        beforeSend: function()
    //        {
    //             var load = '<div class="loading" id="loading">\
    //                 <div class="loading-bar"></div>\
    //                 <div class="loading-bar"></div>\
    //                 <div class="loading-bar"></div>\
    //                 <div class="loading-bar"></div>\
    //             </div>';
    //             var original = $("#idForm").replaceWith(load);
    //        }
    //     })
    //     // .done(function(data)
    //     // {
    //     //     $("#loading").delay(30000).replaceWith("<h1>Success !<h1>");
    //     // });
    //     e.preventDefault();
    // });
    
});

function isValid(str)
{
    return !/[~`!#$%\^&*=\\+\.µ£¤²\-\_°()[\]\\;,/@{}|\\":<>\?]/g.test(str);
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
