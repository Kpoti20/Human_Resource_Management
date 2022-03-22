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
    <label for="element_administratif">Element admninistratif</label>
    <input type="text" required autocomplete="off" class="form-control" name="element_administratif" id="element_administratif">
</div>
<div class="form-group">
    <label for="nombre_demande">Nombre de demande</label>
    <input type="float" required autocomplete="off" class="form-control" name="nombre_demande" id="nombre_demande">
</div>
<div class="form-group">
    <label for="element_comptable">Element comptable</label>
    <input type="float" required autocomplete="off" class="form-control" name="element_comptable" id="element_comptable">
</div>
<div class="form-group">
    <label for="cout">Cout</label>
    <input type="float" required autocomplete="off" class="form-control" name="cout" id="cout">
</div>
<div class="form-group">
    <label for="observation">Observation</label>
    <input type="text" required autocomplete="off" class="form-control" name="observation" id="observation">
</div>

