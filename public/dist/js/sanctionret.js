// Script pour la gestion des sanctions des retards
$('#editesr').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var ntsa = button.data('myntsa')
    var srid = button.data('srid')
    var modal = $(this)
    modal.find('.modal-body #ntsa').val(ntsa);
    modal.find('.modal-body #sanctionr_id').val(srid);
})

$('#deletesr').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var srid = button.data('srid')
    var modal = $(this)
    modal.find('.modal-body #sanctionr_id').val(srid);
})