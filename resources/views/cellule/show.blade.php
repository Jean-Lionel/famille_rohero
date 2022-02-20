@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Cellule {{ $cellule->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/cellule') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/cellule/' . $cellule->id . '/edit') }}" title="Edit Cellule"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('cellule' . '/' . $cellule->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Cellule" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID : </th><td>{{ $cellule->id }}</td>
                                    <th>Nom  : </th><td> {{ $cellule->name }} </td>
                                    <th> Description : </th><td> {{ $cellule->content }} </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">

          <table id="dataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($cellule->membres as $membre)
                    {{-- expr --}}
                <tr>
                    <td>{{ $membre->id}}</td>
                    <td>{{ $membre->firstName}}</td>
                    <td>{{ $membre->lastName}}</td>
                    <td>{{ $membre->telephone}}</td>
                    <td>{{ $membre->email}}</td> 
                </tr>
                @endforeach
               
            </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
