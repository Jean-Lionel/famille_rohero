<div class="form-group {{ $errors->has('firstNames') ? 'has-error' : ''}}">
    <label for="firstNames" class="control-label">{{ 'Firstnames' }}</label>
    <input class="form-control" name="firstNames" type="text" id="firstNames" value="{{ isset($cellule->firstNames) ? $cellule->firstNames : ''}}" >
    {!! $errors->first('firstNames', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    <label for="lastName" class="control-label">{{ 'Lastname' }}</label>
    <input class="form-control" name="lastName" type="text" id="lastName" value="{{ isset($cellule->lastName) ? $cellule->lastName : ''}}" >
    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="control-label">{{ 'Telephone' }}</label>
    <input class="form-control" name="telephone" type="text" id="telephone" value="{{ isset($cellule->telephone) ? $cellule->telephone : ''}}" >
    {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($cellule->email) ? $cellule->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cellule_id') ? 'has-error' : ''}}">
    <label for="cellule_id" class="control-label">{{ 'Cellule' }}</label>
    <input class="form-control" name="cellule_id" type="number" id="cellule_id" value="{{ isset($cellule->cellule_id) ? $cellule->cellule_id : ''}}" >
    {!! $errors->first('cellule_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Enregistre' }}">
</div>
