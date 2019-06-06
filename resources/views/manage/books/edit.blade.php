@extends('layouts.manage')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Create Book Form</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('books.update', $book->isbn) }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="create_book_form">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ISBN</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="isbn" class="form-control" value="{{$book->isbn}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Judul</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="title" class="form-control" value="{{$book->title}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Penulis</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="author" class="form-control" value="{{$book->author}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Penerbit</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="publisher" class="form-control" value="{{$book->publisher}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Huraian</label></div>
                            <div class="col-12 col-md-12">
                                <input type="text" name="description" class="form-control" value="{{$book->description}}">
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$book->id}}">
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="create_book_form">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>  
    
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
