// Script pour la gestion des absences
$('#editeab').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_debut = button.data('date_debut')
    var date_fin = button.data('date_fin')
    var motif = button.data('motif')
    var id_ab = button.data('id_ab')
    var modal = $(this)
    modal.find('.modal-body #date_debut').val(date_debut);
    modal.find('.modal-body #date_fin').val(date_fin);
    modal.find('.modal-body #motif').val(motif);
    modal.find('.modal-body #absence_id').val(id_ab);
})

$('#deleteab').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_ab = button.data('id_ab')
    var modal = $(this)
    modal.find('.modal-body #absence_id').val(id_ab);
})
