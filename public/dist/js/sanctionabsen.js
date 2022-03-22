// Script pour la gestion des sanctions des absences
$('#edites').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nts = button.data('mynts')
    var sid = button.data('sid')
    var modal = $(this)
    modal.find('.modal-body #nts').val(nts);
    modal.find('.modal-body #sanction_id').val(sid);
})

$('#deletes').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var sid = button.data('sid')
    var modal = $(this)
    modal.find('.modal-body #sanction_id').val(sid);
})