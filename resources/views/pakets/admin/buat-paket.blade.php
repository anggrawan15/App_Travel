@extends('pakets.admin.layout-admin')

@section('title')
    <title>Buat Paket Wisata</title>
@endsection

@section('content')
<br>
<br>
<div class ="container">
    <div class="row">
        <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{route('paket.list')}}" class="btn btn-warning btn-md">Carts</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

            <form action="{{ route('wisata.carts') }}" method="post">
                @csrf
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            Wisata
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="wisata_id">Wisata</label>
                                <select name="wisata_id" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach ($wisata as $row)
                                    <option value="{{ $row->id }}" >{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('wisata_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Lama digunkan</label>
                                <input type="number" name="jumlah" value="1">
                        </div> 

                        <div class="form-group">
                            <button class="btn btn-primary">Tambah</button>
                        </div>                 
                    </div>
                </div>
            </form>
            
            <br>

            
            <form action="{{ route('hotel.carts') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Hotel
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="hotel_id">Status</label>
                                <select name="hotel_id" class="form-control" required>
                                    
                                    <option value="">Pilih</option>
                                    @foreach ($hotel as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('hotel_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Lama digunakan</label>
                                <input type="number" name="jumlah" value="1">
                        </div> 

                        <div class="form-group">
                            <button class="btn btn-primary">Tambah</button>
                        </div> 
                        
                    </div>
                </div>
            </form>
           
            
            <br>

            <form action="{{ route('resto.carts') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Restorand
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="hotel_id">Resto</label>
                                <select name="resto_id" class="form-control" required>
                                   
                                    <option value="">Pilih</option>
                                    @foreach ($resto as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('resto_id') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Lama digunakan</label>
                                <input type="number" name="jumlah" value="1">
                        </div> 

                        <div class="form-group">
                            <button class="btn btn-primary">Tambah</button>
                        </div>  

                    </div>
                </div>
            </form>
           
            

        
        </div>
    </div>

    

</div>

@endsection