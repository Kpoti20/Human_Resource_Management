// Script pour la gestion des renumerations des employes
$('#editren').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var element_administratif = button.data('element_administratif')
    var nombre_demande = button.data('nombre_demande')
    var element_comptable = button.data('element_comptable')
    var cout = button.data('cout')
    var observation = button.data('observation')
    var id_ren = button.data('id_ren')
    var modal = $(this)
    modal.find('.modal-body #element_administratif').val(element_administratif);
    modal.find('.modal-body #nombre_demande').val(nombre_demande);
    modal.find('.modal-body #element_comptable').val(element_comptable);
    modal.find('.modal-body #cout').val(cout);
    modal.find('.modal-body #observation').val(observation);
    modal.find('.modal-body #renumeration_id').val(id_ren);
})

$('#deleteren').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_ren = button.data('id_ren')
    var modal = $(this)
    modal.find('.modal-body #renumeration_id').val(id_ren);
})