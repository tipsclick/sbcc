@section('title')
    Role ({{ $role->name }})
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
                            <h3>{{ __('Modify Roles') }}</h3>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-warning"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col col-6">
                                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-control mx-2" placeholder="Name" name="name"
                                        value="{{ $role->name }}" autofocus required>
                                    <div class="d-flex justify-content-between mt-5">
                                        <h4 class="card-title">Select Permissions</h4>
                                        <div class="custom-checkbox-button">
                                            <div class="form-check-inline checkbox-primary">
                                                <input type="checkbox" id="select_all">
                                                <label for="select_all" class="pl-2">Select All</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-checkbox-button mt-3">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check-inline checkbox-primary">
                                                <input class="checkbox" type="checkbox"
                                                    id="permission-{{ $permission->id }}" name="permission_id[]"
                                                    value="{{ $permission->id }}"
                                                    @if ($permission->id == old('permissions')) checked @endif
                                                    @foreach ($role->permissions as $v_permission) @if ($v_permission->id == $permission->id)
                                            checked
                                            @endif @endforeach>
                                                <label for="permission-{{ $permission->id }}"
                                                    class="pl-2">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <button class="btn btn-success mx-2 mt-3">Update</button>

                                </form>
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
    <script>
        $(document).ready(function() {
            //select all checkboxes
            $("#select_all").change(function() { //"select all" change 
                $(".checkbox").prop('checked', $(this).prop(
                    "checked")); //change all ".checkbox" checked status
            });
        });
    </script>
@endsection
