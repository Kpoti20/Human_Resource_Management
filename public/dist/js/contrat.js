// Script pour la gestion des contrats
$('#editc').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var lib = button.data('mylib')
    var cont = button.data('mycont')
    var dem = button.data('mydem')
    var demb = button.data('mydemb')
    var deche = button.data('mydeche')
    var de = button.data('mydfr')
    var contrat_id = button.data('ctid')
    var modal = $(this)
    modal.find('.modal-body #libelle').val(lib);
    modal.find('.modal-body #contenu').val(cont);
    modal.find('.modal-body #demb').val(dem);
    modal.find('.modal-body #datembauche').val(demb);
    modal.find('.modal-body #datecheance').val(deche);
    modal.find('.modal-body #dfr').val(de);
    modal.find('.modal-body #ct_id').val(contrat_id);
})

$('#deletec').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var contrat_id = button.data('ctid')
    var modal = $(this)
    modal.find('.modal-body #ct_id').val(contrat_id);
})