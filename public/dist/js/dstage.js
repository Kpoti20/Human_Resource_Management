// Script pour la gestion des demandes de stage
$('#editsta').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nom_prenom = button.data('nom_prenom')
    var adresse = button.data('adresse')
    var contact = button.data('contact')
    var diplome = button.data('diplome')
    var poste = button.data('poste')
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #nom_prenom').val(nom_prenom);
    modal.find('.modal-body #contact').val(contact);
    modal.find('.modal-body #adresse').val(adresse);
    modal.find('.modal-body #diplome').val(diplome);
    modal.find('.modal-body #poste').val(poste);
    modal.find('.modal-body #dstage_id').val(id);
})

$('#deletesta').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #dstage_id').val(id);
})