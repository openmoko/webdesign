/**
 * Javascript functions for Shop
 */
$(document).ready(function(){
    $("div.product-spec").find("ul").slideUp(1);
    
    $('div.product-spec').find('h3').click(function(){
        $(this).next().slideToggle(1);
        $(this).toggleClass("expanded");
        
        return false;
    });
});
