// Script pour la gestion des services
$('#edit').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var Nom = button.data('mynom')
    var des = button.data('mydes')
    var service_id = button.data('serid')
    var modal = $(this)
    modal.find('.modal-body #nom').val(Nom);
    modal.find('.modal-body #des').val(des);
    modal.find('.modal-body #serv_id').val(service_id);
})

$('#delete').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var service_id = button.data('serid')
    var modal = $(this)
    modal.find('.modal-body #serv_id').val(service_id);
})