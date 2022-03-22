<div class="form-group">
    <label for="personnel_membre">Personnel</label>
    <select class="form-control" required name="personnel_membre" id="personnel_membre">
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
<div class="form-group">
    <label for="date_debut">Date debut</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_debut" id="date_debut">
</div>
<div class="form-group">
    <label for="date_fin">Date fin</label>
    <input type="date" autocomplete="off" class="form-control" name="date_fin" id="date_fin">
</div>