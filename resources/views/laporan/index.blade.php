@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-file pr-2" style="font-size: 15px;"></i> <span>Laporan</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
                {{-- <a href="{{ route('outlet.createoutlet') }}"><button class="btn mt-4 text-white" style="background-color:#3FC5F0;"><i class="fas fa-plus mr-1"></i> Tambah Data</button></a> --}}
                {{-- <a href="{{route('crudsiswa.cetaksiswa')}}"><button class="btn btn-primary mt-4 text-white" ><i class="fas fa-file-pdf mr-1"></i> Print PDF</button></a> --}}
                <div class="table-responsive mt-2">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">NO</th>
                          <th scope="col">TANGGAL</th>
                          <th scope="col">TOTAL PESANAN</th>
                          <th scope="col">TOTAL PENDAPATAN</th>
                          {{-- <th scope="col">ACTION</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @for ($i = 0; $i < count($transaksi); $i++)
                            <tr>
                            <td >{{ $i+1 }}</td>
                            <td>{{ Carbon\Carbon::parse($transaksi[$i]['tgl'])->isoFormat("D MMMM Y") }}</td>
                            <td>{{ $transaksi[$i]['jumlah'] }}</td>
                            <td>{{ $transaksi[$i]['total'] }}</td>
                            {{-- <td>belum ada pendapatan</td> --}}
                            </tr>
                        @endfor
                        
                      </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-left">
                    
                        {{-- {{ $outlet->links() }} --}}
                    
                </div>
            </div>
            
        </div>
        
    </section>
@endsection