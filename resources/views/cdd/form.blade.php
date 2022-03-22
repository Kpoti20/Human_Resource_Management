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
    <label for="date_embauche">Date d'embauche</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_embauche" id="date_embauche">
</div>
<div class="form-group">
    <label for="date_debut_cdd">Date debut cdd</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_debut_cdd" id="date_debut_cdd">
</div>
<div class="form-group">
    <label for="date_fin_cdd">Date fin cdd</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_fin_cdd" id="date_fin_cdd">
</div>
<div class="form-group">
    <label for="date_echeance_cdd">Date echeance cdd</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_echeance_cdd" id="date_echeance_cdd">
</div>