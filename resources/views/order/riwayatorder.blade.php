@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-shopping-bag pr-2" style="font-size: 15px;"></i> <span>Riawayat Order</span>
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
                          <th scope="col">OUTLET</th>
                          <th scope="col">PAKET</th>
                          <th scope="col">HARGA</th>
                          {{-- <th scope="col">TANGGAL DIPESAN</th>
                          <th scope="col">BATAS DIAMBIL</th> --}}
                          <th scope="col">STATUS</th>
                          <th scope="col">PEMBAYARAN</th>
                          <th scope="col">ACTION</th>
                          {{-- <th scope="col">TANGGAL DIBAYAR</th> --}}
                          {{-- <th scope="col">ACTION</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $item)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$item->outlets->nama}}</td>
                          <td>{{$item->pakets->nama_paket}}</td>
                          <td>Rp. {{number_format($item->biaya)}}</td>
                          {{-- <td>{{$item->tgl}}</td>
                          <td>{{$item->batas_waktu}}</td> --}}
                          <td>
                              @if ($item->status == 'baru')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-warning text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'proses')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-info text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'selesai')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-primary text-white">{{$item->status}}</div>
                              @endif
                              @if ($item->status == 'diambil')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-success text-white">{{$item->status}}</div>
                              @endif
                          </td>
                          <td>
                              @if ($item->dibayar == 'dibayar')
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-success text-white">dibayar</div>
                              @endif
                              @if ($item->dibayar == 'belum_dibayar')
                                    @if ($item->status == 'proses' or $item->status == 'selesai')
                                        <span style="font-size: 10px; padding: 5px; border-radius: 5px; opacity: 50%;" class="badge bg-danger text-white">batalkan pesanan</span>
                                        @else
                                        {{-- <a href="#"style="font-size: 10px; padding: 5px; border-radius: 5px" class="badge bg-danger text-white">batalkan pesanan</a> --}}
                                        <form action="{{ route('order.cancel',$item->id) }}" method="POST">
                                          @csrf
                                          {{-- <button type="submit" style="font-size: 10px;" class="btn btn-danger btn-sm mt-2">Batalkan Pesanan</button> --}}
                                          <button style="font-size: 10px;  border-radius: 5px; border-color:none;" class=" bg-danger text-white mt-2" type="submit">batalkan pesanan</button> 
                                        </form>
                                    @endif
                                  
                                  <br>
                                  <div style="font-size: 10px; padding: 5px; border-radius: 5px;" class="badge bg-secondary">belum dibayar</div>
                              @endif
                          </td>
                          <td class="text-center">
                            {{-- <form action="{{route('order.show',$item->id)}}" method="POST"> --}}
                              @method('DELETE')
                              @csrf
                                
                                <a href="{{ route('order-showorder',$item->id) }}">
                                  <i class="fas fa-eye" style="color: #3abaf4"></i>&ensp;     
                                </a>
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