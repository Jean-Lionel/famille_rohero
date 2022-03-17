<div>
    {{-- Do your work, then step back. --}}

    <div class="row">
        <div class="col-md-4">
            <label for="">Numéro du Membre</label>
            <input type="number" min="0" wire:model="membreId" class="form-control form-control-sm" wire:keyup.enter="searchMembre">
        </div>
        <div class="col-md-8">
            @if (session()->has('error'))
                {{-- expr --}}
                <div class="alert alert-danger">
                    {{ session("error")}}
                </div>
            @endif
        </div>
        @if ($membre)
            {{-- expr --}}
            <div class="col-md-12">
               <h4 class="text-center">historique des cotisations de <b>{{ $membre->fullname }}</b></h4>
                <table id="dataTable" class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Nom et prénom</th>
                            <th>Cotisation | Contribution</th>
                            <th>Montant</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($membre->contributions as $contribution)
                            {{-- expr --}}
                            <tr>
                                <td>{{ $membre->fullname}}</td>
                                <td>{{  $contribution->cotisation->name}}</td>
                                <td>{{  $contribution->montant}}</td>
                                <td>{{  $contribution->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @endif
        
    </div>
</div>
