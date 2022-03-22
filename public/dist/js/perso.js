// Script pour la gestion du personnel
$('#editepersonnel').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var matricule = button.data('matricule')
    var nom_prenom = button.data('nom_prenom')
    var statut = button.data('statut')
    var numero_cnss = button.data('numero_cnss')
    var lieu_affectation = button.data('lieu_affectation')
    var anciennete = button.data('anciennete')
    var personne_charge = button.data('personne_charge')
    var date_naissance = button.data('date_naissance')
    var lieu_naissance = button.data('lieu_naissance')
    var filiation = button.data('filiation')
    var date_entree_etablissement = button.data('date_entree_etablissement')
    var date_sortie_etablissement = button.data('date_sortie_etablissement')
    var situation_matrimoniale = button.data('situation_matrimoniale')
    var sexe = button.data('sexe')
    var nationnalite = button.data('nationnalite')
    var telephonne_1 = button.data('telephonne_1')
    var telephone_2 = button.data('telephone_2')
    var mail = button.data('mail')
    var adresse = button.data('adresse')
    var universite = button.data('universite')
    var niveau_etude = button.data('niveau_etude')
    var diplome = button.data('diplome')
    var annee_diplome = button.data('annee_diplome')
    var personnel_id = button.data('personnel_id')
    var modal = $(this)
    modal.find('.modal-body #matricule').val(matricule);
    modal.find('.modal-body #nom_prenom').val(nom_prenom);
    modal.find('.modal-body #statut').val(statut);
    modal.find('.modal-body #numero_cnss').val(numero_cnss);
    modal.find('.modal-body #lieu_affectation').val(lieu_affectation);
    modal.find('.modal-body #anciennete').val(anciennete);
    modal.find('.modal-body #personne_charge').val(personne_charge);
    modal.find('.modal-body #date_naissance').val(date_naissance);
    modal.find('.modal-body #lieu_naissance').val(lieu_naissance);
    modal.find('.modal-body #filiation').val(filiation);
    modal.find('.modal-body #date_entree_etablissement').val(date_entree_etablissement);
    modal.find('.modal-body #date_sortie_etablissement').val(date_sortie_etablissement);
    modal.find('.modal-body #situation_matrimoniale').val(situation_matrimoniale);
    modal.find('.modal-body #sexe').val(sexe);
    modal.find('.modal-body #nationnalite').val(nationnalite);
    modal.find('.modal-body #telephonne_1').val(telephonne_1);
    modal.find('.modal-body #telephone_2').val(telephone_2);
    modal.find('.modal-body #mail').val(mail);
    modal.find('.modal-body #adresse').val(adresse);
    modal.find('.modal-body #universite').val(universite);
    modal.find('.modal-body #diplome').val(diplome);
    modal.find('.modal-body #annee_diplome').val(annee_diplome);
    modal.find('.modal-body #personne_id').val(personnel_id);
})

$('#deletepersonnel').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var personnel_id = button.data('personnel_id')
    var modal = $(this)
    modal.find('.modal-body #personne_id').val(personnel_id);
})