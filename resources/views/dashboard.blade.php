@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('cms/style/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('page-content')
    <section class="main-content">
        <div class="container">
            <h1 class="text-center text-uppercase">Analytics and Statistics Card</h1>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="stat-card">
                        <div class="stat-card__content">
                            <p class="text-uppercase mb-1 text-muted">Users</p>
                            <h2>{{$user_count}}</h2>
                        </div>
                        <div class="stat-card__icon stat-card__icon--success">
                            <div class="stat-card__icon-circle">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 " >
                    <div class="stat-card">
                        <div class="stat-card__content">
                            <p class="text-uppercase mb-1 text-muted">leaves Types</p>
                            <h2>{{$leave_count}}</h2>
                        </div>
                        <div class="stat-card__icon stat-card__icon--primary">
                            <div class="stat-card__icon-circle">
                                <i class="fa fa-sign-out"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="stat-card">
                        <div class="stat-card__content">
                            <p class="text-uppercase mb-1 text-muted">leaves request</p>
                            <h2>{{$leave_request_count}}</h2>
                        </div>
                        <div class="stat-card__icon stat-card__icon--danger">
                            <div class="stat-card__icon-circle">
                                <i class="fa fa-sign-out"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
