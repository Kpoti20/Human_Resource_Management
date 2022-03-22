<div class="form-group">
    <label for="personnel_membre_titulaire">Titulaire</label>
    <select class="form-control" required name="personnel_membre_titulaire" id="personnel_membre_titulaire">
        <option value="">Faites un choix</option>
        @foreach($personnel as $ca)
            <option value="{{$ca->id}}">{{$ca->nom_prenom}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="personnel_membre_interimaire">Interimaire</label>
    <select class="form-control" required name="personnel_membre_interimaire" id="personnel_membre_interimaire">
        <option value="">Faites un choix</option>
        @foreach($personnel as $ca)
            <option value="{{$ca->id}}">{{$ca->nom_prenom}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="poste_id">Poste occupé</label>
    <select class="form-control" required name="poste_id" id="poste_id">
        <option value="">Faites un choix</option>
        @foreach($poste as $p)
            <option value="{{$p->id}}">{{ $p->libelle }}</option>
        @endforeach
    </select>
</div>