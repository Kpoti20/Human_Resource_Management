// Script pour la gestion des personnes a prevenir
$('#editpprevenir').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nom_prenoms = button.data('nom_prenoms')
    var pprevenirs_adresse = button.data('pprevenirs_adresse')
    var telephone = button.data('telephone')
    var lien = button.data('lien')
    var id_pprevenirs = button.data('id_pprevenirs')
    var modal = $(this)
    modal.find('.modal-body #nom_prenoms').val(nom_prenoms);
    modal.find('.modal-body #adresse').val(pprevenirs_adresse);
    modal.find('.modal-body #telephone').val(telephone);
    modal.find('.modal-body #lien').val(lien);
    modal.find('.modal-body #pprevenir_id').val(id_pprevenirs);
})

$('#deletepprevenir').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_pprevenirs = button.data('id_pprevenirs')
    var modal = $(this)
    modal.find('.modal-body #pprevenir_id').val(id_pprevenirs);
})