<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Users Management
            </h2>
            <div class="float-right">
                @can('project-create')
                <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
                @endcan
            </div>
        </div>
    </x-slot>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $c)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->email }}</td>
            <td>
                @if(!empty($c->getRoleNames()))
                @foreach($c->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                @can('user-edit')
                <a class="btn btn-primary" href="{{ route('users.edit',$c->id) }}"><i class="fa fa-pencil"></i></a>
                @endcan
                @can('user-delete')
                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{" users/del/".$c['id']}}"><i
                        class="fa fa-trash"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>


    {!! $data->render() !!}

</x-app-layout>