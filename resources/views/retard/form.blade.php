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
    <label for="date_retard">Date retard</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_retard" id="date_retard">
</div>
<div class="form-group">
    <label for="heure_arrive">Heure arrive</label>
    <input type="time" required autocomplete="off" class="form-control" name="heure_arrive" id="heure_arrive">
</div>
<div class="form-group">
    <label for="motif">Motif</label>
    <input type="text" required autocomplete="off" class="form-control" name="motif" id="motif">
</div>
<div class="form-group">
    <label for="sanction_retard">Sanction retard</label>
    <select class="form-control" required name="sanction_retard" id="sanction_retard">
        <option value="">Faites un choix</option>
        <option value="Premier avertissement">
            Premier avertissement
        </option>
        <option value="Mise à pied">
            Mise à pied
        </option>
    </select>
</div>