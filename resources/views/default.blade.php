<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('shared.head')
<body>
    <div id="app">
        @include('shared.nav')
        @include('shared.alerts')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
