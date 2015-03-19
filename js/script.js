/**
 * Created by duber on 9/03/15.
 */
$(document).ready(function(){
    $('#colombia').on('mouseenter',function(){
        $('.colombia').removeClass('hidden')
        $('.canada').addClass('hidden')
        $('.australia').addClass('hidden')
        $('.espana').addClass('hidden')
    });
    $('#australia').on('mouseenter',function(){
        $('.australia').removeClass('hidden')
        $('.colombia').addClass('hidden')
        $('.canada').addClass('hidden')
        $('.espana').addClass('hidden')
    });
    $('#canada').on('mouseenter',function(){
        $('.australia').addClass('hidden')
        $('.colombia').addClass('hidden')
        $('.canada').removeClass('hidden')
        $('.espana').addClass('hidden')
    });
    $('#espana').on('mouseenter',function(){
        $('.australia').addClass('hidden')
        $('.colombia').addClass('hidden')
        $('.canada').addClass('hidden')
        $('.espana').removeClass('hidden')
    });
});


