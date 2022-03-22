// Script pour la gestion des retards
$('#editeret').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_retard = button.data('date_retard')
    var heure_arrive = button.data('heure_arrive')
    var motif = button.data('motif')
    var sanction_retard = button.data('sanction_retard')
    var id_ret = button.data('id_ret')
    var modal = $(this)
    modal.find('.modal-body #date_retard').val(date_retard);
    modal.find('.modal-body #heure_arrive').val(heure_arrive);
    modal.find('.modal-body #motif').val(motif);
    modal.find('.modal-body #sanction_retard').val(sanction_retard);
    modal.find('.modal-body #retard_id').val(id_ret);
})

$('#deleteret').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_ret = button.data('id_ret')
    var modal = $(this)
    modal.find('.modal-body #retard_id').val(id_ret);
})
