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
    <label for="evenement">Evenement</label>
    <input type="text" required autocomplete="off" class="form-control" name="evenement" id="evenement">
</div>
<div class="form-group">
    <label for="date_evenement">Date evenement</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_evenement" id="date_evenement">
</div>
<div class="form-group">
    <label for="don">Don</label>
    <input type="text" required autocomplete="off" class="form-control" name="don" id="don">
</div>