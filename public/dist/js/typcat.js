// Script pour la gestion des types de categories
$('#editt').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var lib = button.data('mylib')
    var t_id = button.data('tid')
    var modal = $(this)
    modal.find('.modal-body #libelle').val(lib);
    modal.find('.modal-body #t_id').val(t_id);
})

$('#deletet').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var t_id = button.data('tid')
    var modal = $(this)
    modal.find('.modal-body #t_id').val(t_id);
})