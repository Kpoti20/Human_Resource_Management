// Script pour la gestion des contrat-cdi
$('#editcdi').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var date_embauche = button.data('date_embauche')
    var date_debut_cdd = button.data('date_debut_cdd')
    var date_debut_cdi = button.data('date_debut_cdi')
    var date_retraite = button.data('date_retraite')
    var id_cdi = button.data('id_cdi')
    var modal = $(this)
    modal.find('.modal-body #date_embauche').val(date_embauche);
    modal.find('.modal-body #date_debut_cdd').val(date_debut_cdd);
    modal.find('.modal-body #date_debut_cdi').val(date_debut_cdi);
    modal.find('.modal-body #date_retraite').val(date_retraite);
    modal.find('.modal-body #cdi_id').val(id_cdi);
})

$('#deletecdi').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_cdi = button.data('id_cdi')
    var modal = $(this)
    modal.find('.modal-body #cdi_id').val(id_cdi);
})