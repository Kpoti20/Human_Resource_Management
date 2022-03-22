// Script pour la gestion des demandes d'emploi
$('#editemp').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nom_prenom = button.data('nom_prenom')
    var contact = button.data('contact')
    var adresse = button.data('adresse')
    var diplome = button.data('diplome')
    var poste = button.data('poste')
    var id_emplo = button.data('id_emplo')
    var modal = $(this)
    modal.find('.modal-body #nom_prenom').val(nom_prenom);
    modal.find('.modal-body #contact').val(contact);
    modal.find('.modal-body #adresse').val(adresse);
    modal.find('.modal-body #diplome').val(diplome);
    modal.find('.modal-body #poste').val(poste);
    modal.find('.modal-body #demploi_id').val(id_emplo);
})

$('#deletemp').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_emplo = button.data('id_emplo')
    var modal = $(this)
    modal.find('.modal-body #demploi_id').val(id_emplo);
})