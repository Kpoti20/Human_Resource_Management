// Script pour la gestion des interimaires
// $('#editei').on('show.bs.modal', function (event) {
//
//     var button = $(event.relatedTarget)
//     var pos = button.data('myin')
//     var iid = button.data('iid')
//     var modal = $(this)
//     modal.find('.modal-body #poste').val(pos);
//     modal.find('.modal-body #interim_id').val(iid);
// })

$('#deleteint').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_int = button.data('id_int')
    var modal = $(this)
    modal.find('.modal-body #interim_id').val(id_int);
})
