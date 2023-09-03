{{-- main homepage --}}

@include('partials.frontend.header')
@include('partials.frontend.banner')

<div>
    @yield('content')
</div>

@include('partials.frontend.testi')
@include('partials.frontend.choose')
@include('partials.frontend.footer')
