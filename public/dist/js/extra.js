// Script pour la gestion des extras
$('#editextra').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var evenement = button.data('evenement')
    var date_evenement = button.data('date_evenement')
    var don = button.data('don')
    var id_ext = button.data('id_ext')
    var modal = $(this)
    modal.find('.modal-body #evenement').val(evenement);
    modal.find('.modal-body #date_evenement').val(date_evenement);
    modal.find('.modal-body #don').val(don);
    modal.find('.modal-body #extra_id').val(id_ext);
})

$('#deletext').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_ext = button.data('id_ext')
    var modal = $(this)
    modal.find('.modal-body #extra_id').val(id_ext);
})