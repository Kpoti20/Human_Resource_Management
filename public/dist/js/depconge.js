// Script pour les departs au conges
$('#editdepc').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_depart = button.data('date_depart')
    var date_retour = button.data('date_retour')
    var date_arrivee = button.data('date_arrivee')
    var id_depc = button.data('id_depc')
    var modal = $(this)
    modal.find('.modal-body #date_depart').val(date_depart);
    modal.find('.modal-body #date_retour').val(date_retour);
    modal.find('.modal-body #date_arrivee').val(date_arrivee);
    modal.find('.modal-body #departconge_id').val(id_depc);
})

$('#deletedepc').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_depc = button.data('id_depc')
    var modal = $(this)
    modal.find('.modal-body #departconge_id').val(id_depc);
})