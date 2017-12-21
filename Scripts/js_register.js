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
});

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
