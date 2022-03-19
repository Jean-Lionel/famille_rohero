<style>
    .liste_line{
        display: flex;
        justify-content: space-between;
    }
    .liste_line small{
        width:  200px;
    }
    hr{
       margin-top: 0;
       margin-bottom: 0 ;
    }


    @media screen and (max-width: 900px){
         .liste_line{
            display:none;
         }
    }
</style>

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
                                <ul>
                                    <li class="liste_line">
                                        <small><b>Nom et Prénom</b></small>
                                        <small><b>Type de cotisation</b></small>
                                        <small><b>Montant</b></small>
                                        <small><b>Date</b></small>
                                    </li>
                                    <hr>
                                    @foreach ($cellule->contributionTypeCotisations() as $element)
                                    {{-- expr --}}
                                    <li class="liste_line">
                                        <small>{{ $element->membre->fullname }}</small>
                                        <small>{{ $element->cotisation->name }}</small>
                                        <small>{{ $element->montant}}</small>
                                        <small>{{ $element->created_at}}</small>
                                    </li>
                                    <hr>
                                    @endforeach
                                </ul>
                            </td>
                            <th>{{ $cellule->getTotalMontant() }}  </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $cellules->links()}}
        </div>
    </div>
</div>
