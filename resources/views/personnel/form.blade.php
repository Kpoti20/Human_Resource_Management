<div class="form-group">
    <label for="matricule">Matle</label>
    <input type="text" maxlength="6" required autocomplete="off" class="form-control" name="matricule" id="matricule">
</div>
<div class="form-group">
    <label for="nom_prenom">No et pren</label>
    <input type="text"  required autocomplete="off" class="form-control" name="nom_prenom" id="nom_prenom">
</div>
<div class="form-group">
    <label for="statut">Statut</label>
    <select class="form-control" required name="statut" id="statut">
        <option value="">Faites un choix</option>
        <option value="STAGE">STAGE</option>
        <option value="CDE">CDE</option>
        <option value="CDD">CDD</option>
        <option value="CDI">CDI</option>
    </select>
</div><br><br>
<div class="form-group">
    <label for="numero_cnss">N°CNSS</label>
    <input type="float" maxlength="6" required autocomplete="off" class="form-control" name="numero_cnss" id="numero_cnss">
</div>
<div class="form-group">
    <label for="categorie_professionnelle">Cat prof</label>
    <select class="form-control" required name="categorie_professionnelle" id="categorie_professionnelle">
        <option value="">Faites un choix</option>
        @foreach($categories as $ca)
            <option value="{{$ca->id}}">{{$ca->nom_categories}} {{ $ca->echelon}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="lieu_affectation">Lieu d'aff</label>
    <input type="text" required  autocomplete="off" name="lieu_affectation" id="lieu_affectation" class="form-control" >
</div><br><br>
<div class="form-group">
    <label for="anciennete">Ancie</label>
    <input type="float" autocomplete="off" name="anciennete" id="anciennete" class="form-control" >
</div>
<div class="form-group">
    <label for="personne_charge">Pers charg</label>
    <input type="float" required autocomplete="off" name="personne_charge" id="personne_charge" class="form-control" >
</div>
<div class="form-group">
    <label for="date_naissance">Naiss</label>
    <input type="date" required autocomplete="off" name="date_naissance" id="date_naissance" class="form-control" >
</div><br><br>
<div class="form-group">
    <label for="lieu_naissance">Lieu Naiss</label>
    <input type="text" required autocomplete="off" name="lieu_naissance" id="lieu_naissance" class="form-control" >
</div>
<div class="form-group">
    <label for="filiation">Filiation</label>
    <input type="text" required autocomplete="off" name="filiation" id="filiation" class="form-control" >
</div>
<div class="form-group">
    <label for="date_entree_etablissement">Date entree</label>
    <input type="date"  required autocomplete="off" name="date_entree_etablissement" id="date_entree_etablissement" class="form-control" >
</div><br><br>
<div class="form-group">
    <label for="date_sortie_etablissement">Date sortie</label>
    <input type="date"  autocomplete="off" name="date_sortie_etablissement" id="date_sortie_etablissement" class="form-control" >
</div>
<div class="form-group">
    <label for="situation_matrimoniale">Sit Mat</label>
    <select class="form-control" required name="situation_matrimoniale" id="situation_matrimoniale">
        <option value="">Faites un choix</option>
        <option value="Célibataire">Célibataire</option>
        <option value="Marié(e)">Marié(e)</option>
        <option value="Divorçé(e)">Divorçé(e)</option>
    </select>
</div>
<div class="form-group">
    <label for="sexe">Sexe</label>
    <select class="form-control" required name="sexe" id="sexe">
        <option value="">Faites un choix</option>
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select>
</div><br><br>
<div class="form-group">
    <label for="nationnalite">Nation</label>
    <input type="text" required autocomplete="off" name="nationnalite" id="nationnalite" class="form-control" >
</div>
<div class="form-group">
    <label for="telephonne_1">Tel1</label>
    <input type="text" maxlength="8" autocomplete="off" name="telephonne_1" id="telephonne_1" class="form-control" >
</div>
<div class="form-group">
    <label for="telephone_2">Tel2</label>
    <input type="text" maxlength="8" autocomplete="off" name="telephone_2" id="telephone_2" class="form-control" >
</div><br><br>
<div class="form-group">
    <label for="mail">Mail</label>
    <input type="email" autocomplete="off" name="mail" id="mail" class="form-control" >
</div>
<div class="form-group">
    <label for="adresse">Adr</label>
    <input type="text" required autocomplete="off" name="adresse" id="adresse" class="form-control" >
</div>
<div class="form-group">
    <label for="universite">Univ</label>
    <input type="text" autocomplete="off" name="universite" id="universite" class="form-control" >
</div><br><br>
<div class="form-group">
    <label for="niveau_etude">Niv Et</label>
    <input type="text" autocomplete="off" name="niveau_etude" id="niveau_etude" class="form-control" >
</div>
<div class="form-group">
    <label for="diplome">Dip</label>
    <input type="text" autocomplete="off" name="diplome" id="diplome" class="form-control" >
</div>
<div class="form-group">
    <label for="annee_diplome">An Dip</label>
    <input type="float" autocomplete="off" name="annee_diplome" id="annee_diplome" class="form-control" >
</div>