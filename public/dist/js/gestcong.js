// Script pour la gestion des conges
$('#editeco').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nbc = button.data('mynbc')
    var cid = button.data('cid')
    var modal = $(this)
    modal.find('.modal-body #nbc').val(nbc);
    modal.find('.modal-body #conge_id').val(cid);
})

$('#deleteco').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var cid = button.data('cid')
    var modal = $(this)
    modal.find('.modal-body #conge_id').val(cid);
})