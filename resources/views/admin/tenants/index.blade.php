@section('title')
    Tenants
@endsection
@extends('layouts.main')
@section('style')
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
                            <h3>Manage Tenants</h3>
                            <a href="{{ route('admin.tenants.create') }}" class="btn btn-primary">New Tenant</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th width="5%">Office</th>
                                        <th width="20%">Business Name</th>
                                        <th width="15%">Tenant Name</th>
                                        <th width="15%">Service Charges</th>
                                        <th width="10%">Monthly Rent</th>
                                        <th width="10%">Type</th>
                                        <th width="10%">Revision</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenants as $key => $tenantsAll)
                                        <tr
                                            class="@if ($key == 1) bg-success @elseif($key == 2) bg-warning @elseif($key == 3) bg-info @elseif($key == 4) bg-danger @elseif($key == 5) bg-primary @endif">
                                            <td colspan="9" class=" text-center text-white">Floor: {{ $key }}</td>
                                        </tr>
                                        @foreach ($tenantsAll as $tenant)
                                            <tr
                                                >
                                                <th scope="row" class="@if ($tenant->floor == 1) table-success @elseif($tenant->floor == 2) table-warning @elseif($tenant->floor == 3) table-info @elseif($tenant->floor == 4) table-danger @elseif($tenant->floor == 5) table-primary @endif">{{ $tenant->office_no }}</th>
                                                <td>{{ $tenant->name }}</td>
                                                <td>{{ $tenant->business_name }} </td>
                                                <td>{{ env('CURRENCY') }} {{ number_format($tenant->service_charges) }}
                                                </td>
                                                <td>{{ env('CURRENCY') }} {{ number_format($tenant->monthly_rent) }} </td>
                                                <td> {{ $tenant->type }} </td>
                                                <td>{{ $tenant->revision_date ? $tenant->revision_date->format('d M Y') : '' }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn  @if ($tenant->is_active) btn-success @else  btn-dark @endif dropdown-toggle" type="button"
                                                            id="dropdownMenu{{$tenant->id}}" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                           {{$tenant->is_active ? 'Active' : 'Expired'}} 
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$tenant->id}}">
                                                            <a class="dropdown-item" href="{{ route('admin.tenants.edit', $tenant->id) }}"> <i
                                                            class="feather icon-edit-2"></i> Modify</a>
                                                            <a class="dropdown-item" href="{{ route('admin.tenants.show', $tenant->id) }}"> <i
                                                            class="feather icon-eye"></i> View</a>
                                                            <a class="dropdown-item" href="{{ route('admin.tenants.files', $tenant->id) }}"> <i
                                                            class="feather icon-folder"></i> Documents</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "pageLength": 25,
                // fixedHeader: true,
                responsive: true
            });
        });
    </script>
@endsection
