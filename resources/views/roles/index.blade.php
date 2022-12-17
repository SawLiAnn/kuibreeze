<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Roles Management
            </h2>
            <div class="float-right">
                @can('project-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}">Create New Role</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach($roles as $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                {{-- @can('role-edit') --}}
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil"></i></a>
                {{-- @endcan --}}
                @can('role-delete')
                {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy',
                $role->id],'style'=>'display:inline'])
                !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!} --}}

                {{-- <a class="btn btn-danger" href={{"del/".$role['id']}}>Delete</a> --}}

                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{"
                    roles/del/".$role['id']}}"><i class="fa fa-trash"></i></a>

                {{-- <x-button type="submit" variant="primary" size="base">Submit</x-button> --}}

                {{-- <a type="button" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light"
                    data-toggle="tooltip" data-placement="top" data-original-title="@lang('app.delete')"
                    onclick="confirmAlert('{{ Asset($link.'delete/'.$role->id) }}')"><i
                        class="feather icon-trash-2"></i></a> --}}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}

</x-app-layout>
{{-- @endsection --}}