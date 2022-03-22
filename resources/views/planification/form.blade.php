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
    <label for="date_debut_conge">Date debut</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_debut_conge" id="date_debut_conge">
</div>
<div class="form-group">
    <label for="date_fin_conge">Date fin</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_fin_conge" id="date_fin_conge">
</div>
