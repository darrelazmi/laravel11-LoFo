<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/tambah.css') }}">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="homepage" target="#"><image class="title" src="{{ URL::asset('assets/logolofo.png') }}"></a>
            <div class="search-box">
                <h1>Temuan Barang</h1>
            </div>
            <div class="hilang-box">
                <h1><a href="{{route('hilang.index')}}">Laporan Kehilangan</a></h1>
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
            <h2>Tambah Temuan Barang</h2>
            <div class="input-grup">
                <form action="{{route('home.process')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-row">  
                        <div class="form-group">
                            <img id="image-preview" src="" alt="Image Preview" style="display: none; width: 200px; height: auto;">
                            <input type="file" id="item-photo" name="foto_barang" accept="image/*">
                        </div>
                        <div class="text-group">
                            <input type="text" id="item-name" name="nama_barang" required placeholder="Nama Barang" >
                            <input type="text" id="lokasi-name" name="lokasi" required placeholder="Lokasi Temuan" >
                            <input type="tel" id="whatsapp-number" name="phone" required placeholder="No WA (format: 62xxx)" >
                            <input type="hidden" name="user_id" value="{{$id}}">
                        </div>
                    </div>
                    <div class="wide-group">
                        <textarea id="item-details" name="deskripsi" rows="4" required placeholder="Deskripsi Barang Temuan"></textarea>
                    </div>
                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/tambah.js')}}"></script>
</body>

</html>