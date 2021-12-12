@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('title page')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div id="count" class="count container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $residents }}">0</h3>
                            <p>Penduduk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('kelola_data-data_penduduk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $kk }}">0<sup style="font-size: 20px"></sup></h3>
                            <p>Kartu Keluarga</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-card"></i>
                        </div>
                        <a href="{{ route('kelola_data-data_kartu_keluarga') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $lk->count() }}">0</h3>
                            <p>Laki - laki</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-male"></i>
                        </div>
                        <a href="{{ route('kelola_data-data_penduduk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $pr->count() }}">0</h3>
                            <p>Perempuan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-female"></i>
                        </div>
                        <a href="{{ route('kelola_data-data_penduduk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $borns }}">0</h3>
                            <p>Lahir</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-happy"></i>
                        </div>
                        <a href="{{ route('sirkulasi_penduduk-data_lahir') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $dies }}">0<sup style="font-size: 20px"></sup></h3>
                            <p>Meninggal</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-sad"></i>
                        </div>
                        <a href="{{ route('sirkulasi_penduduk-data_meninggal') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $comes }}">0</h3>
                            <p>Pendatang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-download"></i>
                        </div>
                        <a href="{{ route('sirkulasi_penduduk-data_pendatang') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 class="counter-value" data-count="{{ $moves }}">0</h3>
                            <p>Pindah</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-upload"></i>
                        </div>
                        <a href="{{ route('sirkulasi_penduduk-data_pindah') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <section class="col-lg-6 connectedSortable">
                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Info Penduduk Tahun @php echo date('Y') @endphp</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
                <section class="col-lg-6 connectedSortable">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Donut Chart</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- chart -->
    <script>
        $(function () {
          /* ChartJS
          * -------
          * Here we will create a few charts using ChartJS
          */
  
          //--------------
          //- AREA CHART -
          //--------------
  
          // Get context with jQuery - using jQuery's .get() method.
          // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
  
          var areaChartData = {
            labels  : ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Okt', 'Nov', 'Dec'],
            datasets: [
              {
                label               : 'Pendatang',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [
                                        {{ $datang['Jan'] }}, 
                                        {{ $datang['Feb'] }}, 
                                        {{ $datang['March'] }}, 
                                        {{ $datang['April'] }}, 
                                        {{ $datang['May'] }}, 
                                        {{ $datang['June'] }}, 
                                        {{ $datang['July'] }}, 
                                        {{ $datang['Aug'] }}, 
                                        {{ $datang['Sept'] }}, 
                                        {{ $datang['Okt'] }}, 
                                        {{ $datang['Nov'] }}, 
                                        {{ $datang['Dec'] }}
                                    ]
              },
              {
                label               : 'Pindah',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [
                                        {{ $pindah['Jan'] }}, 
                                        {{ $pindah['Feb'] }}, 
                                        {{ $pindah['March'] }}, 
                                        {{ $pindah['April'] }}, 
                                        {{ $pindah['May'] }}, 
                                        {{ $pindah['June'] }}, 
                                        {{ $pindah['July'] }}, 
                                        {{ $pindah['Aug'] }}, 
                                        {{ $pindah['Sept'] }}, 
                                        {{ $pindah['Okt'] }}, 
                                        {{ $pindah['Nov'] }}, 
                                        {{ $pindah['Dec'] }}
                                    ]
              },
            ]
          }
  
          // var areaChartOptions = {
          //   maintainAspectRatio : false,
          //   responsive : true,
          //   legend: {
          //     display: false
          //   },
          //   scales: {
          //     xAxes: [{
          //       gridLines : {
          //         display : false,
          //       }
          //     }],
          //     yAxes: [{
          //       gridLines : {
          //         display : false,
          //       }
          //     }]
          //   }
          // }
  
          // // This will get the first returned node in the jQuery collection.
          // new Chart(areaChartCanvas, {
          //   type: 'line',
          //   data: areaChartData,
          //   options: areaChartOptions
          // })
  
          //-------------
          //- LINE CHART -
          //--------------
          // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
          // var lineChartOptions = $.extend(true, {}, areaChartOptions)
          // var lineChartData = $.extend(true, {}, areaChartData)
          // lineChartData.datasets[0].fill = false;
          // lineChartData.datasets[1].fill = false;
          // lineChartOptions.datasetFill = false
  
          // var lineChart = new Chart(lineChartCanvas, {
          //   type: 'line',
          //   data: lineChartData,
          //   options: lineChartOptions
          // })
  
          //-------------
          //- DONUT CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var donutData        = {
            labels: [
                'Kartu Keluarga',
                'Penduduk',
                'Lahir',
                'Meninggal',
            ],
            datasets: [
              {
                data: ['{{ $kk }}','{{ $residents }}','{{ $borns }}','{{ $dies }}'],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
              }
            ]
          }
          var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })
  
          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          // var pieData        = donutData;
          // var pieOptions     = {
          //   maintainAspectRatio : false,
          //   responsive : true,
          // }
          // //Create pie or douhnut chart
          // // You can switch between pie and douhnut using the method below.
          // new Chart(pieChartCanvas, {
          //   type: 'pie',
          //   data: pieData,
          //   options: pieOptions
          // })
  
          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0
  
          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }
  
          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })
  
          // //---------------------
          // //- STACKED BAR CHART -
          // //---------------------
          // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
          // var stackedBarChartData = $.extend(true, {}, barChartData)
  
          // var stackedBarChartOptions = {
          //   responsive              : true,
          //   maintainAspectRatio     : false,
          //   scales: {
          //     xAxes: [{
          //       stacked: true,
          //     }],
          //     yAxes: [{
          //       stacked: true
          //     }]
          //   }
          // }
  
          // new Chart(stackedBarChartCanvas, {
          //   type: 'bar',
          //   data: stackedBarChartData,
          //   options: stackedBarChartOptions
          // })
        })
    </script>
    
    {{-- Count --}}
    <script>
        $(document).ready(function() {
            var a = 0;
                var cTop = $('#count').offset().top - window.innerHeight,
                    scroll = $(window).scrollTop();
                if (a == 0 && scroll > cTop ) {
                    $('.counter-value').each(function() {
                        var $this 	= $(this),
                            countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        },
                        {
                            duration: 5*1000,
                            easing: 'swing',
                            step: function() {
                                if($this.hasClass('with-plus')) {
                                    $this.text(Math.floor(this.countNum) + '+');
                                } else {
                                    $this.text(Math.floor(this.countNum));
                                }
                            },
                            complete: function() {
                                if($this.hasClass('with-plus')) {
                                    $this.text(this.countNum + '+');
                                } else {
                                    $this.text(this.countNum);
                                }
                                // alert('finished');
                            }
                        });
                    });
                    a = 1;
                }
            
        })
    </script>
@endpush

