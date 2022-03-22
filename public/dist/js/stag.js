// Script pour la gestion des stagiaires
$('#editst').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var dte = button.data('mydte')
    var dtd = button.data('mydtd')
    var mt = button.data('myt')
    var stid = button.data('stid')
    var modal = $(this)
    modal.find('.modal-body #dte').val(dte);
    modal.find('.modal-body #dtd').val(dtd);
    modal.find('.modal-body #mt').val(mt);
    modal.find('.modal-body #sta_id').val(stid);
})

$('#deletest').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var stid = button.data('stid')
    var modal = $(this)
    modal.find('.modal-body #sta_id').val(stid);
})