// Script pour la gestion des cumuls

$('#deletecum').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_cum = button.data('id_cum')
    var modal = $(this)
    modal.find('.modal-body #cumul_id').val(id_cum);
})