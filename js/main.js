/**
 * Показывать или спрятать форму с телефонами
 * 
 */
function showRegisterBox(){
    if( $("#registerBoxHidden").css('display') != 'block') {
        $("#registerBoxHidden").show();
    } else {
        $("#registerBoxHidden").hide();
    }
}