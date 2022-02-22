@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cotisation : <b> {{ $typecotisation->name }} </b></div>
                    <div class="card-body">

                        <a href="{{ url('/type-cotisation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/type-cotisation/' . $typecotisation->id . '/edit') }}" title="Edit TypeCotisation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $typecotisation->id }}</td>
                                         <th> {{ $typecotisation->name }} </th>
                                          <th> Description </th><td> {{ $typecotisation->description }} </td>
                                          <th>Total des contributeurs</th>
                                          <td>
                                              {{$typecotisation->contribution->count()}} personnes
                                          </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <h4 class="text-center">Liste des contributeurs</h4>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom et prénom</th>
                                        <th>Cellulle</th>
                                        <th>Montant</th>
                                        <th>Date de paiment</th>
                                    </tr>
                                    
                                </thead>

                                <tbody>

                                    @foreach ($typecotisation->contribution as $element)
                                        {{-- expr --}}
                                        <tr>
                                            <td>  {{ ++$loop->index}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
