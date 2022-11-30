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
                            <h3>Manage Offices</h3>
                            <a href="{{ route('admin.offices.create') }}" class="btn btn-primary">New Office</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th width="5%">ID</th>
                                        <th width="20%">Office No</th>
                                        <th width="15%">Floor</th>
                                        <th width="15%">Area</th>
                                        <th width="10%">Monthly Rent</th>
                                        <th width="10%">Type</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offices as $office)
                                        <tr>
                                            <th scope="row">{{ $office->id }}</th>
                                            <td>{{ $office->office_no }}</td>
                                            <td>{{ $office->floor }} </td>
                                            <td>{{ $office->area }} </td>
                                            <td>{{ env('CURRENCY') }} {{ number_format($office->monthly_rent) }} </td>
                                            <td> {{ $office->office_type }} </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn  @if ($office->is_active) btn-success @else  btn-dark @endif dropdown-toggle"
                                                        type="button" id="dropdownMenu{{ $office->id }}"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ $office->is_active ? 'Active' : 'Expired' }}
                                                    </button>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenu{{ $office->id }}">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.offices.edit', $office->id) }}"> <i
                                                                class="feather icon-edit-2"></i> Modify</a>
                                                        {{-- <a class="dropdown-item" href="{{ route('admin.offices.show', $office->id) }}"> <i
                                                            class="feather icon-eye"></i> View</a> --}}
                                                        {{-- <a class="dropdown-item" href="{{ route('admin.offices.files', $office->id) }}"> <i
                                                            class="feather icon-folder"></i> Documents</a> --}}
                                                    </div>
                                                </div>
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
@endsection
