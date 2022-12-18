<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">
    {{-- @php
    dd(Request::segment(1));
    @endphp --}}
    @php($page = Request::segment(1))

    {{-- <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown> --}}
    {{--
    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{" roles/del/".$role['id']}}"><i
            class="fa fa-trash"></i></a> --}}

    @can('project-list')
    <x-sidebar.link title="Manage Project" href="{{ route('projects.index') }}"
        :isActive="request()->routeIs('projects.*')">
        <x-slot name="icon">
            <i class="fa fa-file-text" aria-hidden="true"></i>
        </x-slot>
    </x-sidebar.link>
    @endcan
    @can('user-list')
    <x-sidebar.link title="Manage Users" href="{{ route('users.index') }}" :isActive="request()->routeIs('users.*')">
        {{-- <x-slot name=" icon">
            <x-heroicon-s-heart class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot> --}}
        <x-slot name="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
        </x-slot>
    </x-sidebar.link>
    @endcan
    @can('role-list')
    <x-sidebar.link title="Manage Roles" href="{{ route('roles.index') }}" :isActive="request()->routeIs('roles.*')">
        <x-slot name="icon">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </x-slot>
    </x-sidebar.link>
    @endcan


</x-perfect-scrollbar>