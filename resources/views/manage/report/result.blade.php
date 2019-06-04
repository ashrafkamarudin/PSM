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
    		<div class="col-md-9">
            
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Bar chart </h4>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            
                        
      		</div>  
		</div>
	</div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('script')
<script>
( function ( $ ) {
    "use strict";

    //bar chart
    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Disember" ],
            datasets: [{
                label: "Semua",
                data: [ 
                    {{ $monthly['01'] or 0 }}, 
                    {{ $monthly['02'] or 0 }}, 
                    {{ $monthly['03'] or 0 }}, 
                    {{ $monthly['04'] or 0 }}, 
                    {{ $monthly['05'] or 0 }}, 
                    {{ $monthly['06'] or 0 }}, 
                    {{ $monthly['07'] or 0 }}, 
                    {{ $monthly['08'] or 0 }}, 
                    {{ $monthly['09'] or 0 }}, 
                    {{ $monthly['10'] or 0 }}, 
                    {{ $monthly['11'] or 0 }}, 
                    {{ $monthly['12'] or 0 }} 
                ],
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
            }]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                } ]
            }
        }
    } );

} )( jQuery );
</script>
@endsection
