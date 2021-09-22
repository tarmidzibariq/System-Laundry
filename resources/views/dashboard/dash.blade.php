@extends('master')
@section('content')
    <section id="dashboard">
        <div class="container mt-5">
            {{-- crud --}}
            {{-- <h6>Crud Data</h6> --}}
            <div class="row pt-5">
               
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-random"></i></p>
                            <p>{{ $outlet }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-users"></i></p>
                            <p>{{$pengguna}}</p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="">
                        <div class="card text-center">
                            <p><i class="fas fa-shopping-cart"></i></p>
                            <p>123</p>
                        </div>
                    </a>
                </div>

            </div>
            {{-- Chart --}}

             @if (Auth::user()->role == "admin" or Auth::user()->role == "owner" or Auth::user()->role == "kasir" )
                 <div class="row">
                 <div class="col-md-6">
                     <div class="card" style="height: 400px">
                        <div id="chartPesanan"></div>
                    </div>
                 </div>
             </div>
             @endif

            {{-- Akhir Chart --}}
        </div>
    </section>
@endsection
@section('chart')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartPesanan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            backgroundColor: false,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Data Pesanan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                name: {!! json_encode($kategori[0]) !!},
                y:{{$transaksi->where('role', 'admin')->count()}},
            },{
                name: {!! json_encode($kategori[1]) !!},
                y:{{$transaksi->where('role', 'kasir')->count()}},
            },{
                name: {!! json_encode($kategori[2]) !!},
                y:{{$transaksi->where('role', 'owner')->count()}},
            },{
                name: {!! json_encode($kategori[3]) !!},
                y:{{$transaksi->where('role', 'member')->count()}},
            }]
        }]
    });
    </script>
@endsection