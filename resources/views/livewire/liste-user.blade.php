<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div>
        <h5 class="text-center">Liste des utilisateurs</h5>
        <div class="col-md-4">
            <input type="text" class="form-control form-control-sm" wire:model="search">
        </div>
        <table class="table table-striped table-sm ">
            <tr>
                <th>Nom et Prénom</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            @foreach ($users as $user)
                {{-- expr --}}
                <tr>
                   <td>{{$user->name}}</td> 
                   <td>{{$user->email}}</td> 
                   <td>{{$user->role}}</td> 
                </tr>
            @endforeach
        </table>

        {{$users->links()}}
    </div>
</div>
