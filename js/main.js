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


/**
*Подтверждение удаления
*
*/
function areYuoSure(){
	return confirm('Вы уверены, что хотите удалить?');
}