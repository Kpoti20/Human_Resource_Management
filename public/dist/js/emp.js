// Script pour la gestion des employes
$('#editem').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var cn = button.data('mycn')
    var la = button.data('myla')
    var an = button.data('myan')
    var pch = button.data('myp')
    var eid = button.data('eid')
    var modal = $(this)
    modal.find('.modal-body #cn').val(cn);
    modal.find('.modal-body #la').val(la);
    modal.find('.modal-body #an').val(an);
    modal.find('.modal-body #pch').val(pch);
    modal.find('.modal-body #emp_id').val(eid);
})

$('#deletem').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var eid = button.data('eid')
    var modal = $(this)
    modal.find('.modal-body #emp_id').val(eid);
})