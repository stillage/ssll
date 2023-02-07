@section('title', '| Overtime - Review')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-7 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Review Overtime Submission') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('overtime.index') }}">{{ __('Overtime') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('Review Overtime Submissoin') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Submission from') }} : <b>{{ $overtime->user->fullname }}</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('overtime.update', $overtime->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            @include('attendance.overtime.formReview')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@endsection
