// Script pour la gestion des contrat-cde
$('#editcde').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_embauche = button.data('date_embauche')
    var date_debut_cde = button.data('date_debut_cde')
    var date_fin_cde = button.data('date_fin_cde')
    var id_cde = button.data('id_cde')
    var modal = $(this)
    modal.find('.modal-body #date_embauche').val(date_embauche);
    modal.find('.modal-body #date_debut_cde').val(date_debut_cde);
    modal.find('.modal-body #date_fin_cde').val(date_fin_cde);
    modal.find('.modal-body #cde_id').val(id_cde);
})

$('#deletecde').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_cde = button.data('id_cde')
    var modal = $(this)
    modal.find('.modal-body #cde_id').val(id_cde);
})