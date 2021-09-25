@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-users-cog pr-2" style="font-size: 15px;"></i> <span>Riawayat Order</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
                {{-- <a href=""><button class="btn mt-4 text-white" style="background-color:#3FC5F0;"><i class="fas fa-plus mr-1"></i> Tambah Data</button></a> --}}
                {{-- <a href="{{route('crudsiswa.cetaksiswa')}}"><button class="btn btn-primary mt-4 text-white" ><i class="fas fa-file-pdf mr-1"></i> Print PDF</button></a> --}}
                <div class="table-responsive mt-2">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">NO</th>
                          <th scope="col">PENGGUNA</th>
                          <th scope="col">TANGGAL</th>
                          {{-- <th scope="col">OUTLET</th> --}}
                          <th scope="col">PESANAN</th>
                          <th scope="col">HARGA</th>
                          <th scope="col">STATUS</th>
                          <th scope="col">PEMBAYARAN</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $item)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$item->users->name}}</td>
                          <td>{{ Carbon\Carbon::parse($item->tgl)->isoFormat("D MMMM Y") }}</td>
                          <td style="text-transform: capitalize">{{$item->outlets->nama.' | '.$item->pakets->nama_paket}}</td>
                          <td>{{number_format($item->biaya)}}</td>
                          <td>
                              @if ($item->status == 'baru')
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-warning text-white">{{$item->status}}</div>
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Proses</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Selesai</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Diambil</div> --}}
                              @endif
                              @if ($item->status == 'proses')
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Baru</div> --}}
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-info text-white">{{$item->status}}</div>
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Selesai</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Diambil</div> --}}
                              @endif
                              @if ($item->status == 'selesai')
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Baru</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Proses</div> --}}
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-primary text-white">{{$item->status}}</div>
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Diambil</div> --}}
                              @endif
                              @if ($item->status == 'diambil')
                                    {{-- <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Baru</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Proses</div>
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-secondary text-white">Selesai</div> --}}
                                    <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-success text-white">{{$item->status}}</div>
                              @endif
                          </td>
                          <td>
                              @if ($item->dibayar == 'dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-success text-white">dibayar</div>
                              @endif
                              @if ($item->dibayar == 'belum_dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-danger text-white">Belum Dibayar</div>
                              @endif
                              
                          </td>
                          <td class="">
                            <form action="{{route('entri.delete',$item->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                                
                                <a href="{{ route('entri.show',$item->id) }}">
                                  <i class="fas fa-eye" style="color: #3abaf4"></i>   
                                </a>&nbsp;|&nbsp;
                                <a href="{{ route('entri.edit',$item->id) }}">
                                  <i class="fas fa-edit" style="color: #f39c12"></i>   
                                </a>&nbsp;|
                                 <button type="submit" class=" " style="border: none; background-color: transparent;"><i class="fas fa-trash text-danger"></i></button> 
                            </form>    
                          </td>
                          
                        </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-left">
                    
                        {{ $transaksi->links() }}
                    
                </div>
            </div>
            
        </div>
        
    </section>
@endsection