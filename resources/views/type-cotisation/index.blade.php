@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cotisation et Contribution</div>
                    <div class="card-body">
                        <a href="{{ url('/type-cotisation/create') }}" class="btn btn-success btn-sm" title="Add New TypeCotisation">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nouveau
                        </a>

                        <form method="GET" action="{{ url('/type-cotisation') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Montant contribué (FBU)</th>
                                        <th>Proportion des contributions</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($typecotisation as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td class="">
                                            {{
                                                number_format($item->contribution->sum('montant') ?? 0) 
                                            }}
                                        </td>
                                        <td>
                                            <small>
                                                Contribution {{$item->contribution->count()}} / {{ $total_membres}}
                                            </small>
                                       <div class="progress mb-4">
                                        @php
                                            $value = ($item->contribution->count() / (
                                                $total_membres ?? 1)) *100;
                                        @endphp
                                            
                                            <div class="progress-bar" role="progressbar-sm" style="width: {{$value  }}%" aria-valuenow="{{$value}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{ url('/type-cotisation/' . $item->id) }}" title="View TypeCotisation"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/type-cotisation/' . $item->id . '/edit') }}" title="Edit TypeCotisation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            {{-- <form method="POST" action="{{ url('/type-cotisation' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete TypeCotisation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $typecotisation->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
