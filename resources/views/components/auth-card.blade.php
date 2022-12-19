<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <div>
        {{-- <a href="/">
            <i class="fa fa-pencil"></i>
            <x-application-logo class="w-20 h-20" />
        </a> --}}
        <a href="/" class="logo">
            <img src="{{url('/assets/img/klassy-logo.png')}}" align="klassy cafe html template">
        </a>
    </div>

    <div class="w-full px-6 py-4 my-6 overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</main>