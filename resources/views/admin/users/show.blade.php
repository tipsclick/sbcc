@section('title')
    {{ $user->name }}
@endsection
@extends('layouts.main')
@section('style')
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3>{{ $user->name }}</h3>
                            <div>
                                <a class="btn btn-warning" href="{{ route('admin.users.index') }}">
                                    Go back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">

                    <div class="card-body">
                        <div class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                    class="feather icon-folder"></i></span>
                            <div class="media-body">
                                <p class="mb-0">Clients Visits</p>
                                <h5 class="mb-0">{{ $user->client_visits->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                    class="feather icon-clipboard"></i></span>
                            <div class="media-body">
                                <p class="mb-0">All Time Logins</p>
                                <h5 class="mb-0">{{ $user->logins->count() }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="media">
                            <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i
                                    class="feather icon-users"></i></span>
                            <div class="media-body">
                                <p class="mb-0">Last Login</p>
                                <h5 class="mb-0">
                                    @if ($user->last_login)
                                        <span
                                            class="badge @if (date('Y-m-d', strtotime('-30 day')) < date('Y-m-d', strtotime($user->last_login['created_at']))) badge-success-inverse @else badge-secondary @endif">
                                            {{ date('g:i A - d M Y', strtotime($user->last_login['created_at'])) }}
                                        </span>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body text-center">
                        <div class="user-slider">
                            <div class="user-slider-item">
                                <img src="{{ asset('assets/images/users/boy.svg') }}" alt="avatar" width="100"
                                    class="rounded-circle mt-3 mb-4">
                                <h5>{{ $user->name }}</h5>
                                <p>{{ $user->id }}. {{ $user->email }}</p>
                                <p>{{ $user->role ? $user->role->name : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->

        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
@endsection
