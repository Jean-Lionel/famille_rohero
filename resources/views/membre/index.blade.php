@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Membres</div>
                    <div class="card-body">
                        <a href="{{ url('/membre/create') }}" class="btn btn-success btn-sm" title="Add New Membre">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nouveau
                        </a>
                        <div class="table-responsive">
                            <table  id="dataTable" class="table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Compte</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Téléphone</th>
                                        <th>Cellule</th>
                                        <th>Date d'enregistrement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($membre as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->compte->name ?? '' }}</td>
                                        <td>{{ $item->firstName }}</td>
                                        <td>{{ $item->lastName }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>
                                            {{
                                                $item->cellule->name ?? ""
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                $item->created_at ?? ""
                                            }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/membre/' . $item->id) }}" title="View Membre"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/membre/' . $item->id . '/edit') }}" title="Edit Membre"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/membre' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Membre" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $membre->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
