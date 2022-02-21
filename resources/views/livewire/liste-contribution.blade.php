<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="row">
        <div class="col-md-12">
           
            <a href="{{ route('contribution') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter</a>
        </div>

        <div class="col-md-12">

            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Numéro</th>
                        <th>Nom et Prénom</th>
                        <th>Cellule</th>
                        <th>Cotisation</th>
                        <th>Montant</th>
                        <th>Date</th>
                    </tr>
                    
                </thead>

                <tbody>
                    @foreach ($contributions as $element)
                        {{-- expr --}}
                        <tr>
                            <th>
                                {{ ++$loop->index}}
                            </th>
                            <td>{{$element->id}}</td>
                            <td>{{$element->membre->fullname ?? ""}}</td>
                            <td>{{$element->membre->cellule->name ?? ""}}</td>
                            <td>{{$element->cotisation->name}}</td>
                            <td>{{number_format($element->montant)}}</td>
                            <td>
                                {{ $element->created_at}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $contributions->links()}}
        </div>
    </div>
</div>
