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
                            <p>{{ $order }}</p>
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
        },credits: {
            enabled: false
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
                name: 'Pending',
                y:{{$transaksi->where('status', 'pending')->count()}}, color:'#FB9300',
            },{
                name: 'Verifikasi',
                y:{{$transaksi->where('status', 'verifikasi')->count()}}, color:'#6dccf7',
            },{
                name: 'Pesanan diambil',
                y:{{$transaksi->where('status', 'pesanan_diambil')->count()}}, color:'#FFC107', 
            },{
                name: 'Laundry',
                y:{{$transaksi->where('status', 'laundry')->count()}}, color:'#5C7AEA',
            },{
                name: 'Selesai Laundry',
                y:{{$transaksi->where('status', 'selesai_laundry')->count()}}, color:'#3DB2FF', 
            },{
                name: 'Barang dikirim',
                y:{{$transaksi->where('status', 'barang_dikirim')->count()}}, color:'#3F0071', 
            },{
                name: 'Barang diterima',
                y:{{$transaksi->where('status', 'barang_diterima')->count()}} , color:'#00A19D',
            }]
        }]
    });
    </script>
@endsection