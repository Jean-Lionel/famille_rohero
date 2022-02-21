<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Nouveau Contribution</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('membreId') ? 'has-error' : ''}}">
                                <label for="" class="control-label">{{ 'Numéro' }}</label>
                                <input class="form-control" name="membreId"  wire:model="membreId" wire:keyup.enter="searchMembre" >
                                {!! $errors->first('membreId', '<p class="help-block">:message</p>') !!}
                            </div>

                            @if ($showForm)
                            {{-- expr --}}

                            <div class="form-group">
                                <label for="">Cotisation</label>
                                <select name="" id="" wire:model="cotisationId" class="form-control">
                                    <option value="">... </option>
                                    @foreach ($typecotisations as $element)
                                    {{-- expr --}}
                                    <option value="{{ $element->id }}">{{ $element->name }}</option>
                                    @endforeach
                                </select>
                                 {!! $errors->first('cotisationId', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <label for="">Montant</label>
                                <input type="number" min="0" wire:model="montant" class="form-control">
                                 {!! $errors->first('montant', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Déscription</label>
                                <textarea name="description" class="form-control" wire:model="description" id="" cols="30" rows="2"></textarea>
                               
                            </div>

                            @if (session()->has('error'))
                                {{-- expr --}}
                                <div class="alert alert-danger">
                                    {{session('error') }}
                                </div>

                            @endif
                            @if (session()->has('success'))
                                {{-- expr --}}
                                <div class="alert alert-success">
                                    {{session('success') }}
                                </div>

                            @endif

                            <div>
                                <button class="btn-primary btn-sm" wire:click="savePaiment">Enregistrer</button>
                            </div>

                            @endif

                        </div>
                        <div class="col-md-4">

                            @if ($membre)
                            {{-- expr --}}
                            <table class="table">
                                <tr>
                                    <th>Nom et prénom </th>
                                    <td>{{$membre->fullname}}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone </th>
                                    <td>{{$membre->telephone}}</td>
                                </tr>
                                <tr>
                                    <th>Cellule </th>
                                    <td>{{$membre->cellule->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Compte </th>
                                    <td>{{$membre->compte->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-primary" wire:click="$set('showForm',true)">Valider</button>
                                    </td>
                                </tr>
                            </table>
                            @endif
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
