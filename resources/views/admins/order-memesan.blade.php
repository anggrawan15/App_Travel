@extends('admins.layout')

@section('title')
    <title>Order Status Memesan</title>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Order Status Memesan</h5>
                    </div>

                    <div class="card-body">
                
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Invoice</th>
                                    <th>Nama Paket</th>
                                    <th>Status Order</th>
                                    <th>Tgl Kedatangan</th>
                                    <th>Pengunjung</th>
                                    <th>Total</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse($orderPesan as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->invoice}}</td>
                                        <td>{{$row->paket->nama}}</td>
                                        <td>{!! $row->status_order !!}</td>
                                        <td>{{ $row->tgl_datang }}</td>
                                        <td class="text-center">{{ $row->jumlah }}</td>
                                        <td>Rp {{$row->total}}</td>
                                        <td>
                                            <!-- <form action="{{route('admin.view.order', $row->id)}}" method="get">
                                                @csrf
                                                <button class="btn btn-outline-info">Detail</button>
                                            </form> --> 
                                            <form action="{{route('admin.view.order', $row->id)}}" method="get">
                                                @csrf
                                                <button class="btn btn-outline-info">Detail</button>
                                            </form>

                                        
                                        
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                        {!! $orderPesan->links() !!}
                        </div>
                    </div>

                </div>
                    
            </div>
        </div>
    </div>

@endsection