@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Membre {{ $membre->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/membre') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/membre/' . $membre->id . '/edit') }}" title="Edit Membre"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('membre' . '/' . $membre->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Membre" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $membre->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>CELLULE</th>
                                        <td>{{ $membre->cellule->name ?? "" }}</td>
                                    </tr>

                                    <tr>
                                        <th> Nom </th><td> {{ $membre->firstName }} </td></tr><tr><th> Prénom </th><td> {{ $membre->lastName }} </td></tr><tr><th> Telephone </th><td> {{ $membre->telephone }} </td>
                                    </tr>
                                    <tr>
                                        <th>Montant TOTAL</th>
                                        <th>
                                            {{ number_format($membre->compte->montant) }} # FBU
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
