<div class="form-group">
    <label for="personnel_membre">Agent</label>
    <select class="form-control" required name="personnel_membre" id="personnel_membre">
        <option value="">Faites un choix</option>
        @foreach($personnel as $ca)
            <option value="{{$ca->id}}">{{$ca->nom_prenom}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="nom_prenoms">Nom et prenom(s)</label>
    <input type="text" required autocomplete="off" class="form-control" name="nom_prenoms" id="nom_prenoms">
</div>
<div class="form-group">
    <label for="adresse_personne_prevenir">Adresse</label>
    <input type="text" required autocomplete="off" class="form-control" name="adresse_personne_prevenir" id="adresse_personne_prevenir">
</div>
<div class="form-group">
    <label for="telephone">Telephone</label>
    <input type="text" required autocomplete="off" class="form-control" name="telephone" id="telephone">
</div>
<div class="form-group">
    <label for="lien">Lien</label>
    <input type="text" required autocomplete="off" class="form-control" name="lien" id="lien">
</div>