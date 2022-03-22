// Script pour la gestion des stagiaires
$('#editstage').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_debut_stage = button.data('date_debut_stage')
    var date_fin_stage = button.data('date_fin_stage')
    var id_stages = button.data('id_stages')
    var modal = $(this)
    modal.find('.modal-body #date_debut_stage').val(date_debut_stage);
    modal.find('.modal-body #date_fin_stage').val(date_fin_stage);
    modal.find('.modal-body #stage_id').val(id_stages);
})

$('#deletestage').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_stages = button.data('id_stages')
    var modal = $(this)
    modal.find('.modal-body #stage_id').val(id_stages);
})