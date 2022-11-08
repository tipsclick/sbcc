@section('title')
    Users
@endsection
@extends('layouts.main')
@section('style')
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
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
                            <h3>{{ __('Manage Users') }}</h3>
                            <div>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseNew" role="button"
                                    aria-expanded="false" aria-controls="collapseNew">
                                    Add New User
                                </a>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-warning">Roles</a>
                            </div>
                        </div>
                        <div class="collapse" id="collapseNew">
                            <div class="mb-4">
                                <form action="{{ route('admin.users.store') }}" method="POST">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="form-group col-2">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="{{ old('name') }}"
                                                name="name" autofocus required>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email') }}"
                                                name="email" required>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="form-group col-5">
                                            <div class="form-group">
                                                <label for="role_id" class="form-label">Select Role</label>
                                                <div class="custom-checkbox-button mt-3">
                                                    @foreach ($roles as $role)
                                                        <div class="form-check-inline checkbox-primary">
                                                            <input class="checkbox" type="checkbox"
                                                                id="role-{{ $role->id }}" name="role_id[]"
                                                                value="{{ $role->id }}"
                                                                @if ($role->id == old('roles')) checked @endif
                                                                @foreach (auth() ->user()->roles as $v_role) @if ($v_role->id == $role->id)
                                            checked @endif
                                                                @endforeach>
                                                            <label for="role-{{ $role->id }}"
                                                                class="pl-2">{{ $role->name }}</label>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-1">
                                            <button class="btn btn-success btn-block mt-4">Submit</button>
                                        </div>
                                    </div>





                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }} </td>
                                            <td>
                                                @foreach ($user->getRoleNames() as $role)
                                                    <span class="badge badge-primary">{!! str_replace(',', '</span><span class="badge badge-primary"> ', $role) !!}</span>
                                                @endforeach
                                                {{-- <a
                                                    href="{{ route('admin.users.edit', $user->id) }}">{{ $user->role ? $user->role->name : 'No Role' }}</a> --}}
                                            </td>

                                            <td>
                                                @if ($user->last_login)
                                                    <span
                                                        class="badge @if (date('Y-m-d', strtotime('-30 day')) < date('Y-m-d', strtotime($user->last_login['created_at']))) badge-success-inverse @else badge-secondary @endif">
                                                        {{ date('g:i A - d M Y', strtotime($user->last_login['created_at'])) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : '' }}</td>
                                            <td>
                                                @if (auth()->user()->id != $user->id)
                                                    <a href="{{ route('login.as.user', $user->id) }}"
                                                        class="btn btn-danger-rgba mr-2" title="" data-toggle="tooltip"
                                                        data-placement="top"
                                                        data-original-title="Secretly Login as {{ $user->name }}">
                                                        <i class="feather icon-user"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-warning-rgba mr-2" title="Modify"><i
                                                        class="feather icon-edit-2"></i></a>
                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="btn btn-success-rgba mr-2" title="View"><i
                                                        class="feather icon-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection
