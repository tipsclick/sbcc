@section('title')
    {{ env('APP_NAME') }}
@endsection
@extends('layouts.main')
@section('style')
    <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
    <!-- Slick css -->
    <link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-primary-inverse mr-0"><i
                                                class="feather icon-user"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Total Tenants</h5>
                                        <h4 class="mb-0">{{ $tenants->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($tenants->groupBy('floor') as $key => $tenantsAll)
                        <div class="col-lg-2">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <span
                                                class="action-icon badge @if ($key == 1) badge-success-inverse @elseif($key == 2) badge-warning-inverse @elseif($key == 3) badge-info-inverse @elseif($key == 4) badge-danger-inverse @elseif($key == 5) badge-primary-inverse @endif mr-0"><i
                                                    class="feather icon-user"></i></span>
                                        </div>
                                        <div class="col-7 text-right">
                                            <h5 class="card-title font-14">
                                                @if ($key == 1)
                                                    1st
                                                @elseif($key == 2)
                                                    2nd
                                                @elseif($key == 3)
                                                    3rd
                                                @elseif($key == 4)
                                                    4th
                                                @elseif($key == 5)
                                                    5th
                                                @endif Floor
                                            </h5>
                                            <h4 class="mb-0">{{ $tenantsAll->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-12 col-xl-3">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-primary-inverse mr-0"><i
                                                class="feather icon-user"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Incubations</h5>
                                        <h4 class="mb-0">20/{{ $tenants->where('office_type', 'Incubation')->count() }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated Today</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>25%</span>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-success-inverse mr-0"><i
                                                class="feather icon-award"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Rooms </h5>
                                        <h4 class="mb-0">24/{{ $tenants->where('office_type', 'Room')->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 1 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>23%</span>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <span class="action-icon badge badge-warning-inverse mr-0"><i
                                                class="feather icon-briefcase"></i></span>
                                    </div>
                                    <div class="col-7 text-right">
                                        <h5 class="card-title font-14">Display Centers</h5>
                                        <h4 class="mb-0">10/{{ $tenants->where('office_type', 'Display Center')->count() }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 3 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>15%</span>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-9">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h5 class="card-title mb-0">Followup Performance</h5>
                                    </div>
                                    <div class="col-3">
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0 font-18 float-right" type="button"
                                                id="widgetStudent" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetStudent">
                                                <a class="dropdown-item font-13" href="#">Refresh</a>
                                                <a class="dropdown-item font-13" href="#">Export</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-0 pl-0 pr-2">
                                <div id="apex-area-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-4">
                        <div class="card m-b-30 quote-bg">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <span class=""><i
                                                class="mdi mdi-format-quote-open text-black font-20"></i></span>
                                    </div>
                                    <div class="col-10">
                                        <h5 class="card-title mb-0 text-right">Quote of the Day</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/images/general/school_quote.svg') }}" class="img-fluid my-3"
                                    width="150" alt="school quote">
                                <h5 class="text-primary font-italic my-3">Be the change, You wish<br /> to see in the
                                    World.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->


                </div>
                <!-- End row -->
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 col-lg-9">
                                <h5 class="card-title mb-0">New Tenants</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>Office</th>
                                        <th>Tenet</th>
                                        <th>Business</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenants->sortByDesc('id')->take(5) as $tenant)
                                        <tr>
                                            <td>{{$tenant->office_no}}</td>
                                            <td>{{$tenant->name}}</td>
                                            <td>{{$tenant->business_name}}</td>
                                            <td>{{$tenant->created_at->format('d M Y')}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="card-title mb-0">Recent Employees</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Pic</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees->take(5) as $employee)
                                        <tr>
                                            <td><img src="{{ asset('assets/images/users/men.svg') }}" class="img-fluid"
                                                    width="40" alt="hod"></td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->role ? $employee->role->name : '' }}</td>
                                            <td>
                                                @if ($employee->last_login)
                                                    <span
                                                        class="badge @if (date('Y-m-d', strtotime('-30 day')) < date('Y-m-d', strtotime($employee->last_login['created_at']))) badge-success-inverse @else badge-secondary @endif">
                                                        {{ date('g:i A - d M Y', strtotime($employee->last_login['created_at'])) }}
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
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
    <!-- Apex js -->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('assets/js/custom/custom-dashboard-school.js') }}"></script>
@endsection
