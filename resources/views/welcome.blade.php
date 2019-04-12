@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <h1> Senarai Buku </h1>
            <hr>

            @forelse ($books as $book)
                    
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            Gambar
                        </div>
                        <div class="col-sm-9">
                            <h5 class="card-title"> {{ $book->title }} </h5>
                            <h6 class="card-subtitle mb-2 text-muted"> Author(s) : {{ $book->author }} </h6>
                            <p class="card-text"> {{ str_limit($book->description, $limit = 150, $end = '...') }} </p>
                            <a href="#" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>
            </div><br>

            @empty

            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
        
                <div class="card-body">
                    <h1 class="card-header"> No Records Found </h1>
                </div>
            </div>
                    
            @endforelse
        </div>
    </div>

    <div class="row">
        {{ $books->links( "pagination::bootstrap-4") }}
    </div>

    
</div>
@endsection
