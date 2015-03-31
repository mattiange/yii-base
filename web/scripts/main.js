// listen click, open modal and .load content
/*
 * Quando viene cliccato il pulsante "modalButton"
 * mostra il "modal" con il contenuto "modalContent"
 * preso dal rendering di modal.value
 */
$('#modalButton').click(function (){
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
});
