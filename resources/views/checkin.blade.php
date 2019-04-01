@extends('layouts.auth')

@section('content')
<div class="container">

    @include('_includes.notifications.flash-message')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1> Student Check In </h1>
            <hr>

            <div class="row">
                <div class="col-lg-12">

                    <form id="checkInForm" method="POST" action=" {{ route('checkin.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">IC Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="std_ic" class="form-control" placeholder="Enter IC Number">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <button form="checkInForm" type="submit" class="btn btn-primary float-right">Check In</button>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-center">
            <div class="col-md-8">
                <hr>
    
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List of Check In Students today</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Students that has already checked in</h6>
                                
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">IC</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($checkins as $key => $checkin)
                                            <tr>
                                                <th scope="row"> {{ $key+1 }} </th>
                                                <td> {{ $checkin->std_ic }} </td>
                                                <td> {{ $checkin->created_at->format('g:i A') }} </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th scope="row" colspan="3">No Student Checked In yet</th>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</div>
@endsection
