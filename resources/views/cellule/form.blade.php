<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($cellule->name) ? $cellule->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($cellule->content) ? $cellule->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Enregistrer' }}">
</div>
