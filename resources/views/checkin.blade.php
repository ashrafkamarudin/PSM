@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1> Student Check In </h1>
            <hr>

            <div class="row">
                <div class="col-lg-12">

                    <form>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">IC Number</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Enter IC Number">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary float-right">Check In</button>
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
                                <h5 class="card-title">List of Check In Students</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Students that has already checked in</h6>
                                
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                            <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
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
