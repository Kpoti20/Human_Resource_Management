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
    <label for="date_depart">Date depart</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_depart" id="date_depart">
</div>
<div class="form-group">
    <label for="date_retour">Date fin</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_retour" id="date_retour">
</div>
<div class="form-group">
    <label for="date_arrivee">Date reprise</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_arrivee" id="date_arrivee">
</div>
<div class="form-group">
    <label for="nombre_jour_preleve">Nombre de jour à prelever</label>
    <input type="float" required autocomplete="off" class="form-control" name="nombre_jour_preleve" id="nombre_jour_preleve">
</div>