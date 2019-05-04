@extends('layouts.auth')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <h1> Daftar Masuk Student </h1>
        <hr>

        <div class="row">
            <div class="col-lg-12">

                <form id="checkInForm" method="POST" action=" {{ route('checkin.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nombor IC</label>
                        <div class="col-sm-10">
                            <input type="text" name="std_ic" class="form-control" placeholder="Enter IC Number">
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <button form="checkInForm" type="submit" class="btn btn-primary float-right">Daftar Masuk</button>
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
                        <h5 class="card-title">Senarai Daftar Masuk Pelajar hari ini </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pelajar yang sudah daftar masuk</h6>
                        <h2 class="float-right" style="margin-top:-50px">{{ \Carbon\Carbon::today()->format('d/m/Y') }}</h2>
                                
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pelajar</th>
                                    <th scope="col">Nombor IC</th>
                                    <th scope="col">Masa</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($checkins as $key => $checkin)
                                    <tr>
                                        <td scope="row"> {{ $key+1 }} </td>
                                        <td> {{ $checkin->student->name }} </td>
                                        <td> {{ $checkin->std_ic }} </td>
                                        <td> {{ $checkin->created_at->format('g:i A') }} </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="row" colspan="3">No Student Checked In yet</td>
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
@endsection
