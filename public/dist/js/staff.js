// Script pour la gestion des deuxieme employes
$('#editeem').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var mat = button.data('mat')
    var no = button.data('no')
    var con = button.data('cont')
    var cn = button.data('cn')
    var la = button.data('la')
    var an = button.data('an')
    var pc = button.data('pc')
    var na = button.data('na')
    var lie = button.data('lie')
    var fil = button.data('fil')
    var dten = button.data('dten')
    var dtsen = button.data('dtsen')
    var sm = button.data('sm')
    var sx = button.data('sx')
    var nat = button.data('nat')
    var t1 = button.data('t1')
    var t2 = button.data('t2')
    var ma = button.data('ma')
    var ad = button.data('ad')
    var un = button.data('un')
    var ne = button.data('ne')
    var dp = button.data('dp')
    var and = button.data('and')
    var eid = button.data('eid')
    var modal = $(this)
    modal.find('.modal-body #mat').val(mat);
    modal.find('.modal-body #nop').val(no);
    modal.find('.modal-body #ctra').val(con);
    modal.find('.modal-body #cn').val(cn);
    modal.find('.modal-body #la').val(la);
    modal.find('.modal-body #an').val(an);
    modal.find('.modal-body #pc').val(pc);
    modal.find('.modal-body #na').val(na);
    modal.find('.modal-body #lieunaiss').val(lie);
    modal.find('.modal-body #filiation').val(fil);
    modal.find('.modal-body #dtentreta').val(dten);
    modal.find('.modal-body #dtesortieta').val(dtsen);
    modal.find('.modal-body #sm').val(sm);
    modal.find('.modal-body #sx').val(sx);
    modal.find('.modal-body #nat').val(nat);
    modal.find('.modal-body #t1').val(t1);
    modal.find('.modal-body #t2').val(t2);
    modal.find('.modal-body #ma').val(ma);
    modal.find('.modal-body #ad').val(ad);
    modal.find('.modal-body #un').val(un);
    modal.find('.modal-body #ne').val(ne);
    modal.find('.modal-body #dp').val(dp);
    modal.find('.modal-body #and').val(and);
    modal.find('.modal-body #emp_id').val(eid);
})

$('#deleteem').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var eid = button.data('eid')
    var modal = $(this)
    modal.find('.modal-body #emp_id').val(eid);
})