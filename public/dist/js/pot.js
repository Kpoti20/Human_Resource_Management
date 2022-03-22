// Script pour la gestion des postes de travail
$('#editposte').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var libelle = button.data('libelle')
    var service = button.data('service')
    var id_postes = button.data('id_postes')
    var modal = $(this)
    modal.find('.modal-body #libelle').val(libelle);
    modal.find('.modal-body #service').val(service);
    modal.find('.modal-body #poste_id').val(id_postes);
})

$('#deleteposte').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_postes = button.data('id_postes')
    var modal = $(this)
    modal.find('.modal-body #poste_id').val(id_postes);
})