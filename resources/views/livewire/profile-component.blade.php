<div>
    {{-- Do your work, then step back. --}}
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Numéro du membre</label>
                        <input type="text" class="form-control form-control-sm" wire:model="identifyMember" wire:keyup.enter="searchMembre">
                    </div>
                </div>
                @if ($membre)
                    {{-- expr --}}
                <div class="col-md-12 ">
                    <p>Nom et prénom : <b> {{$membre->fullname}}</b></p>
                    <p>Cellule : <b>{{ $membre->cellule->name ?? ""}}</b></p>
                    <p>Numéro du Membre : <b>{{$membre->compte->name ?? ""}}</b></p>

                    @if ($membre->role == "")
                        {{-- expr --}}
                        <p>
                            <button class="btn btn-warning btn-link" wire:click="setUserMembre">Définir comme utilisateur</button>
                        </p>

                    @endif

                    @if ($createdUser)
                        {{-- expr --}}
                        <p>
                            {{$membre->fullname}} a été ajouté dans la liste des utilisateurs <br>
                            Dès maintenant il peut se connecter en utilisant <b>{{ $createdUser->email}}</b> comme nom d'utilisateur et <b>rohero</b> comme le mot de passe
                        </p>
                    @endif

                    @if (session()->has('error'))
                        {{-- expr --}}
                        <div class="alert alert-danger">
                                    {{session('error') }}
                        </div>

                    @endif
                </div>
                @endif
            </div>
            
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>

