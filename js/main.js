/**
 * Показывать или спрятать форму с телефонами
 * 
 */
function showPhoneBox(){
    if( $("#phoneBoxHidden").css('display') != 'block') {
        $("#phoneBoxHidden").show();
    } else {
        $("#phoneBoxHidden").hide();
    }
}


