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
    		<div class="col-md-6">
        		<div class="card">
          			<div class="card-header">
            			<strong class="card-title">Data Table</strong>
          			</div>
					<div class="card-body">
                        <form>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Jantina</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Semua
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Lelaki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio3" class="form-check-label ">
                                                <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Tingkatan</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">1
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">2
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio3" class="form-check-label ">
                                                <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Jantina</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Tahunan
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Bulanan
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio3" class="form-check-label ">
                                                <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Mingguan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
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
