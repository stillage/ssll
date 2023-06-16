@section('title', '| Dashboard')
@extends('layouts.main1')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                @if ($checkProfil == true)
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-icon"><i class="fa fa-exclamation-circle"></i></span>
                                <span class="alert-text">
                                    <strong>Your profile is not complete!</strong>
                                    Complete your profile so you can use the features to the fullest!
                                    <a href="{{ route('profile') }}" class="text-nowrap text-white text-underline">Complete
                                        profile now</a>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                @role('admin')
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pertanyaan</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $pertanyaan }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                <i class="fa fa-question-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('pertanyaans.index') }}" class="text-nowrap">
                                            Go to pertanyaan index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $users }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('users.index') }}" class="text-nowrap">
                                            Go to users index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Sekolah</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $sekolah }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('sekolahs.index') }}" class="text-nowrap">
                                            Go to Sekolah index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Kategori</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $kategori }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fa fa-list"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('kategoris.index') }}" class="text-nowrap">
                                            Go to kategori index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole

                @role('supervisor')
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Your Team</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $users }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('users.index') }}" class="text-nowrap">
                                            Go to users index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Bobot</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $bobot }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fa fa-filter"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('bobots.index') }}" class="text-nowrap">
                                            Go to bobot index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole

                @role('user')
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Survei</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $survey }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fa fa-filter"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <a href="{{ route('sekolahs.index') }}" class="text-nowrap">
                                            Go to sekolah index
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Chart Survey</h6>
                                <h5 class="h3 mb-0">Scholl</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-purchases" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Holiday Notice</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body mb-12">
                        @if (count($response['response']['holidays']) < 1)
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-icon"><i class="fa fa-sad-tear"></i></span>
                                <span class="alert-text"><strong>No holidays this month!</strong> Don't be sad,
                                    maybe
                                    next month!</span>
                            </div>
                        @endif
                        @for ($i = 0; $i < count($response['response']['holidays']); $i++)
                            <div class="timeline timeline-one-side" data-timeline-content="axis"
                                data-timeline-axis-style="dashed">
                                <div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-bell-55"></i>
                                    </span>
                                    @php
                                        $date = $response['response']['holidays'][$i]['date']['iso'];
                                        $date = substr($date, 8, 2) . '-' . substr($date, 5, 2) . '-' . substr($date, 0, 4);
                                        $day = date('l', strtotime($date));
                                    @endphp
                                    <div class="timeline-content">
                                        <div class="d-flex p-2">
                                            <div>
                                                <span
                                                    class="text-muted text-sm font-weight-bold">{{ $response['response']['holidays'][$i]['description'] }}</span>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0"><i
                                                class="fas fa-clock mr-1"></i>{{ $day . ', ' . $date }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            @include('nav.footer')
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@section('script')
    <script type="text/javascript">
        
    </script>
@endsection
@endsection
