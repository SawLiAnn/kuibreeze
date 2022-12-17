<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Edit Project
            </h2>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}">Back</a>
            </div>
        </div>
    </x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('projects.update',$project->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('projects.form')

    </form>
</x-app-layout>