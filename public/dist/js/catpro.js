// Script pour la gestion des categories professionnelles
$('#editcategorie').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var nom_categories = button.data('nom_categories')
    var echelon = button.data('echelon')
    var type_categories = button.data('type_categories')
    var id_categories = button.data('id_categories')
    var modal = $(this)
    modal.find('.modal-body #nom_categories').val(nom_categories);
    modal.find('.modal-body #echelon').val(echelon);
    modal.find('.modal-body #type_categories').val(type_categories);
    modal.find('.modal-body #categorie_id').val(id_categories);
})

$('#deletecategorie').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_categories = button.data('id_categories')
    var modal = $(this)
    modal.find('.modal-body #categorie_id').val(id_categories);
})