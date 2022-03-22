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
    <label for="date_debut">Date debut</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_debut" id="date_debut">
</div>
<div class="form-group">
    <label for="date_fin">Date fin</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_fin" id="date_fin">
</div>
<div class="form-group">
    <label for="motif">Motif</label>
    <input type="text" required autocomplete="off" class="form-control" name="motif" id="motif">
</div>
<div class="form-group">
    <label for="sanction_absence">Sanction</label>
    <select class="form-control" required name="sanction_absence" id="sanction_absence">
        <option value="">Faites un choix</option>
        <option value="Premier avertissement">
            Premier avertissement
        </option>
        <option value="Déduction des jours de conges">
            Déduction des jours de conges
        </option>
        <option value="Déduction des jours travailles">
            Déduction des jours travailles
        </option>
    </select>
</div>