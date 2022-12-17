<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Edit Role
            </h2>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>
    </x-slot>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br />
                @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true :
                    false,
                    array('class' => 'name')) }}
                    {{ $value->name }}</label>
                <br />
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {{-- <button class="btn btn-primary" type="submit" style="background:#0275d8
            ">Submit</button>
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            <x-button variant="blue" size="base">Button</x-button> --}}
            <x-button type="submit" variant="primary" size="base">Submit</x-button>
        </div>
        {{-- <a class="btn btn-primary" type="submit">Primary</a>
        <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button> --}}
        <div style="display:inline-block">&nbsp</div> <!-- There is a white-space here -->
    </div>
    {!! Form::close() !!}

</x-app-layout>

{{-- @endsection --}}