// Script pour la gestion des contrat-cdd
$('#editcdd').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_embauche = button.data('date_embauche')
    var date_debut_cdd = button.data('date_debut_cdd')
    var date_fin_cdd = button.data('date_fin_cdd')
    var date_echeance_cdd = button.data('date_echeance_cdd')
    var id_cdd = button.data('id_cdd')
    var modal = $(this)
    modal.find('.modal-body #date_embauche').val(date_embauche);
    modal.find('.modal-body #date_debut_cdd').val(date_debut_cdd);
    modal.find('.modal-body #date_fin_cdd').val(date_fin_cdd);
    modal.find('.modal-body #date_echeance_cdd').val(date_echeance_cdd);
    modal.find('.modal-body #cdd_id').val(id_cdd);
})

$('#deletecdd').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_cdd = button.data('id_cdd')
    var modal = $(this)
    modal.find('.modal-body #cdd_id').val(id_cdd);
})