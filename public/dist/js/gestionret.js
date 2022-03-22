// Script pour la gestion des retards
$('#editeret').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var dtr = button.data('mydtr')
    var hr = button.data('myhr')
    var mtf = button.data('mymtf')
    var retid = button.data('retid')
    var modal = $(this)
    modal.find('.modal-body #dtr').val(dtr);
    modal.find('.modal-body #hr').val(hr);
    modal.find('.modal-body #mtf').val(mtf);
    modal.find('.modal-body #retard_id').val(retid);
})

$('#deleteret').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var retid = button.data('retid')
    var modal = $(this)
    modal.find('.modal-body #retard_id').val(retid);
})