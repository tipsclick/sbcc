@section('title')
    Change Password
@endsection
@extends('layouts.main')
@section('style')
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3>{{ __('Change Password') }}</h3>
                        </div>
                        <div>
                            <form action="{{ route('admin.users.password') }}" method="POST">
                                @csrf
                                <div class="form-row justify-content-center">

                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="password" class="form-label">{{ __('Current Password') }}</label>
                                            <input type="password" class="form-control mb-3" placeholder="Current Password"
                                                name="password" id="password">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                            <input type="password" class="form-control mb-3" placeholder="New Password"
                                                name="new_password" id="new_password">
                                        </div>
                                    </div>
                                

                                    <div class="form-group col-md-7">
                                        <button class="btn btn-success btn-block" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
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
