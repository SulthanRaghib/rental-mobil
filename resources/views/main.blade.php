@include('partials.header')
@include('partials.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                @if (Route::is('dashboard'))
                    <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                @else
                    <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                @endif
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            @yield('content')

        </div>
    </section>

</main><!-- End #main -->

@include('partials.footer')
