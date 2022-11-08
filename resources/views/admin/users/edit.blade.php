@section('title')
    Modify Users
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
                            <h3>{{ __('Modify User') }}</h3>
                            <a class="btn btn-warning" href="{{ route('admin.users.index') }}">
                                Go Back
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row justify-content-center">
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                            <input type="text" class="form-control mb-3" placeholder="Name" name="name"
                                                id="name" value="{{ $user->name }}" autofocus required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email" class="form-control mb-3" placeholder="Email" name="email"
                                                id="email" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input type="password" class="form-control mb-3" placeholder="Password"
                                                name="password" id="password">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <div class="form-group">
                                            <label for="role_id" class="form-label">{{ __('Select Role') }}</label>
                                            <div class="custom-checkbox-button mt-3">
                                                @foreach ($roles as $role)
                                                    <div class="form-check-inline checkbox-primary">
                                                        <input class="checkbox" type="checkbox"
                                                            id="role-{{ $role->id }}" name="role_id[]"
                                                            value="{{ $role->id }}"
                                                            @if ($role->id == old('roles')) checked @endif
                                                            @foreach ($user->roles as $v_role) @if ($v_role->id == $role->id)
                                            checked
                                            @endif @endforeach>
                                                        <label for="role-{{ $role->id }}"
                                                            class="pl-2">{{ $role->name }}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-7">
                                        <button class="btn btn-success btn-block" type="submit"
                                            id="product-name">Save</button>
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
