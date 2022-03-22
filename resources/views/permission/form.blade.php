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
    <label for="date_fin">Date reprise</label>
    <input type="date" required autocomplete="off" class="form-control" name="date_fin" id="date_fin">
</div>
<div class="form-group">
    <label for="nombre_jour_preleve">Nombre de jour(s) à prelever </label>
    <input type="float" required autocomplete="off" class="form-control" name="nombre_jour_preleve" id="nombre_jour_preleve">
</div>
<div class="form-group">
    <label for="motif">Motif</label>
    <select class="form-control" required name="motif" id="motif">
        <option value="">Faites un choix</option>
        <option value="Décès d'un conjoint, d'un ascendant ou d'un descendant en ligne directe">
            Décès d'un conjoint, d'un ascendant ou d'un descendant en ligne directe
        </option>
        <option value="Décès d'un frère ou d'une soeur">
            Décès d'un frère ou d'une soeur
        </option>
        <option value="Décès d'un beau-père ou d'une belle-mère">
            Décès d'un beau-père ou d'une belle-mère
        </option>
        <option value="Mariage du travailleur">
            Mariage du travailleur
        </option>
        <option value="Maladie">
            Maladie
        </option>
        <option value="Mariage d'un enfant, d'un enfant, d'un frère ou d'une soeur">
            Mariage d'un enfant, d'un enfant, d'un frère ou d'une soeur
        </option>
        <option value="Naissance au foyer">
            Naissance au foyer
        </option>
        <option value="Baptême">
            Baptême
        </option>
        <option value="Déménagement">
            Déménagement
        </option>
        <option value="Autres">
            Autres
        </option>
    </select>
</div>