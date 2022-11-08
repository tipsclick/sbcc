@section('title')
    New Tenant
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
                            <h3>New Tenant</h3>
                            <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.tenants.store') }}" method="POST">
                            <div class="row justify-content-center">
                                <div class="col col-5">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnic">CNIC</label>
                                        <input type="number" class="form-control" id="cnic" name="cnic"
                                            value="{{ old('cnic') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile No.</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile"
                                            value="{{ old('mobile') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_name">Business Name</label>
                                        <input type="text" class="form-control" id="business_name"
                                            name="business_name" value="{{ old('business_name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="home_address">Home Address</label>
                                        <input type="address" class="form-control" id="home_address"
                                            name="home_address" value="{{ old('home_address') }}" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="office_type">Office Type</label>
                                        <select name="office_type" id="office_type" class="form-control">
                                            <option>Select</option>
                                            <option value="Incubation">Incubation</option>
                                            <option value="Room">Room</option>
                                            <option value="Open Space">Open Space</option>
                                            <option value="Display Center">Display Center</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="floor">Floor No.</label>
                                        <select name="floor" id="floor" class="form-control" required>
                                            <option>Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea class="form-control" id="details" name="details">{{ old('details') }}</textarea>
                                    </div>

                                </div>
                                <div class="col col-5">
                                    
                                    <div class="form-group">
                                        <label for="office_no">Office No.</label>
                                        <input type="number" class="form-control" id="office_no" name="office_no"
                                            value="{{ old('office_no') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_charges">Service Charges</label>
                                        <input type="number" class="form-control" id="service_charges"
                                            name="service_charges" value="{{ old('service_charges') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Area Sqft</label>
                                        <input type="number" class="form-control" id="area" name="area"
                                            value="{{ old('area') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate per Per Square Feet</label>
                                        <input type="number" class="form-control" id="rate" name="rate"
                                            value="{{ old('rate') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_rent">Monthly Rent</label>
                                        <input type="number" class="form-control" id="monthly_rent"
                                            name="monthly_rent" value="{{ old('monthly_rent') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date"
                                            name="start_date" value="{{ old('start_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="revision_date">Revision Date</label>
                                        <input type="date" class="form-control" id="revision_date"
                                            name="revision_date" value="{{ old('revision_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="expiry_date">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date"
                                            name="expiry_date" value="{{ old('expiry_date') }}">
                                    </div>

                                </div>
                                <div class="col col-5">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block mt-3">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
