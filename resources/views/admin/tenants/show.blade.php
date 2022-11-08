@section('title')
    Manage Tenant
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
                            <h3>Manage Tenant ( {{ $tenant->business_name }} )</h3>
                            <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        
                        
                            <div class="row justify-content-center">
                                <div class="col col-6">
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $tenant->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>CNIC</th>
                                            <td>{{ $tenant->cnic }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile No.</th>
                                            <td>{{ $tenant->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Business Name</th>
                                            <td>{{ $tenant->business_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Home Address</th>
                                            <td>{{ $tenant->home_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td>{{ $tenant->details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Floor No.</th>
                                            <td>{{ $tenant->floor }}</td>
                                        </tr>
                                        <tr>
                                            <th>Office No.</th>
                                            <td>{{ $tenant->office_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Service Charges</th>
                                            <td>{{env('CURRENCY')}} {{ number_format($tenant->service_charges) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Area</th>
                                            <td>{{ $tenant->area }} sqft</td>
                                        </tr>
                                        <tr>
                                            <th>Rate</th>
                                            <td>{{env('CURRENCY')}} {{ $tenant->rate }} /sqft</td>
                                        </tr>
                                        <tr>
                                            <th>Monthly Rent</th>
                                            <td>{{env('CURRENCY')}} {{ number_format($tenant->monthly_rent) }} </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $tenant->is_active ? 'Active' : 'Expired' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Office Type</th>
                                            <td>{{ $tenant->office_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Agreement Start Date</th>
                                            <td>{{ $tenant->start_date->format('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Agreement Revision Date</th>
                                            <td>{{ $tenant->revision_date->format('d M Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Agreement Expiry Date</th>
                                            <td>{{ $tenant->expiry_date->format('d M Y') }}</td>
                                        </tr>
                                    </table>
                                    

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
            //    
        });
    </script>
@endsection
