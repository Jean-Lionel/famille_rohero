<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NOM DU CELLULLE</th>
                        <th>Total des membres</th>
                        <th>Contribution</th>
                        <th>TOTAL DES CONTRIBUTIONS</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cellules as $cellule)
                        {{-- expr --}}
                        <tr>
                            <td>{{ $cellule->name }}</td>
                            <td>{{ $cellule->membres->count() }}</td>
                            <td>
                                {{$cellule->contributionTypeCotisations()}}
                            </td>
                            <th>{{
                                $cellule->getTotalMontant()
                            }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $cellules->links()}}
        </div>
    </div>
</div>
