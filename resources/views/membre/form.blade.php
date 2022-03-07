<div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
    <label for="firstName" class="control-label">{{ 'Firstnames' }}</label>
    <input class="form-control" name="firstName" type="text" id="firstName" value="{{ isset($membre->firstName) ? $membre->firstName : ''}}" >
    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    <label for="lastName" class="control-label">{{ 'Lastname' }}</label>
    <input class="form-control" name="lastName" type="text" id="lastName" value="{{ isset($membre->lastName) ? $membre->lastName : ''}}" >
    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="control-label">{{ 'Telephone' }}</label>
    <input class="form-control" name="telephone" type="text" id="telephone" value="{{ isset($membre->telephone) ? $membre->telephone : ''}}" >
    {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($membre->email) ? $membre->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cellule_id') ? 'has-error' : ''}}">
    <label for="cellule_id" class="control-label">{{ 'Cellule' }}</label>

    <select class="form-control" name="cellule_id" type="number" id="cellule_id" value="{{ isset($membre->cellule_id) ? $membre->cellule_id : ''}}">
        <option value=""></option>
        @foreach ($cellules as $cellule)
        {{-- expr --}}
        <option value="{{$cellule->id}}" @if ($cellule->id == $membre->cellule_id)
            {{-- expr --}}
            selected
        @endif>{{$cellule->name}}</option>
        @endforeach
    </select>


    {!! $errors->first('cellule_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Enregistrer' }}">
</div>
