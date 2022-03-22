// Script pour la gestion des contrat-cdi
$('#editoc').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_debut = button.data('date_debut')
    var date_fin = button.data('date_fin')
    var id_occ = button.data('id_occ')
    var modal = $(this)
    modal.find('.modal-body #date_debut').val(date_debut);
    modal.find('.modal-body #date_fin').val(date_fin);
    modal.find('.modal-body #occupation_id').val(id_occ);
})

$('#deleteoc').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_occ = button.data('id_occ')
    var modal = $(this)
    modal.find('.modal-body #occupation_id').val(id_occ);
})