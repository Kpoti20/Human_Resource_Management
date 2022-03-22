// Script pour la gestion des planifications
$('#editeplan').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_debut_conge = button.data('date_debut_conge')
    var date_fin_conge = button.data('date_fin_conge')
    var id_plan = button.data('id_plan')
    var modal = $(this)
    modal.find('.modal-body #date_debut_conge').val(date_debut_conge);
    modal.find('.modal-body #date_fin_conge').val(date_fin_conge);
    modal.find('.modal-body #planification_id').val(id_plan);
})

$('#deleteplan').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_plan = button.data('id_plan')
    var modal = $(this)
    modal.find('.modal-body #planification_id').val(id_plan);
})