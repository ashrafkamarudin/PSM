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
                    <strong>Borang Tambah Buku</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="create_book_form">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">ISBN</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="isbn" placeholder="" class="form-control {{ $errors->has('isbn') ? ' is-invalid' : '' }}">
                            
                                @if ($errors->has('isbn'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">Tajuk</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="email-input" name="title" placeholder="" class="form-control {{ $errors->has('isbn') ? ' is-invalid' : '' }}">

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">Pengarang</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="password-input" name="author" placeholder="" class="form-control {{ $errors->has('isbn') ? ' is-invalid' : '' }}">
                                
                                @if ($errors->has('author'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">Penerbit</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="password-input" name="publisher" placeholder="" class="form-control {{ $errors->has('isbn') ? ' is-invalid' : '' }}">
                                
                                @if ($errors->has('publisher'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Huraian</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" form="create_book_form">
                        <i class="fa fa-dot-circle-o"></i> Hantar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Padam
                    </button>
                </div>
            </div>
        </div>  
    
    </div>
  </div><!-- .animated -->
</div><!-- .content -->
@endsection
