$('#deleco').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var service_id = button.data('cid')
    var modal = $(this)
    modal.find('.modal-body #congprid').val(service_id);
})