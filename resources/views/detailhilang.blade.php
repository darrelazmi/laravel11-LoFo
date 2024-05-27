<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/tambah2.css') }}">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="{{route('home.index')}}" target="#"><image class="title" src="{{ URL::asset('assets/logolofo.png') }}"></a>
            <div class="search-box">
                <h1><a href="{{route('home.index')}}">Temuan Barang</a></h1>
            </div>
            <div class="hilang-box">
                <h1>Laporan Kehilangan</h1>
            </div>
            <form action="{{route('logout')}}" method="get">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
        <div class="header-right">
            <div class="info-temuan">
                <h1>Temuan Barang</h1>
            </div>
            <div class="info-hilang">
                <h1>Laporan Kehilangan</h1>
            </div>
        </div>
        <div class="header">
            <h2>Edit Temuan Barang</h2>
            <div class="input-grup">
                <form action="{{route('hilang.edit', ['barang'=> $barang])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">  
                        <div class="form-group">
                            <img id="image-preview" src="{{url('hilang/'.$barang->foto_barang)}}" alt="Image Preview" style="display: none; width: 200px; height: auto;">
                            <input type="file" id="item-photo" name="foto_barang" accept="image/*" @if ($id!=$barang->user_id) disabled @endif>
                        </div>
                        <div class="text-group">
                            <input type="text" id="item-name" name="nama_barang" required placeholder="Nama Barang" value="{{$barang->nama_barang}}" @if ($id!=$barang->user_id) disabled @endif>
                            <input type="text" id="lokasi-name" name="lokasi" required placeholder="Lokasi Temuan" value="{{$barang->lokasi}}" @if ($id!=$barang->user_id) disabled @endif>
                            <input type="tel" id="whatsapp-number" name="phone" required placeholder="No WA" value="{{$barang->phone}}" @if ($id!=$barang->user_id) disabled @endif>
                        </div>
                    </div>
                    <div class="wide-group">
                        <textarea id="item-details" name="deskripsi" rows="4" required placeholder="Deskripsi Barang Temuan" @if ($id!=$barang->user_id) disabled @endif>{{$barang->deskripsi}}</textarea>
                    </div>
                    <button type="submit" class="submit-button" @if ($id!=$barang->user_id) disabled @endif>Submit</button>
                </form>
                <form action="{{route('hilang.delete', ['barang'=> $barang])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="submit-button" @if ($id!=$barang->user_id) disabled @endif>Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/tambah.js')}}"></script>
</body>

</html>