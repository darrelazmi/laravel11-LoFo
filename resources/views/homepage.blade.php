<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css') }}">
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
            <form action="{{route('logout')}}" method="post">
                @csrf
                @method('post')
                <button type="submit" class="logout-button">Logout</button>
            </form>
            <form action="{{route('delete',['user' => $id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="hapus-akun">Hapus akun</button>
            </form>
        </div>
        <div class="header-right">
            <div class="info-temuan">
                <h1>Temuan Barang: {{$count1}}</h1>
            </div>
            <div class="info-hilang">
                <h1>Laporan Kehilangan: {{$count2}}</h1>
            </div>
        </div>
        <div class="header">
            <h2>List Temuan Barang</h2>
            <form action="{{route('home.add')}}" method="get">
                <button type="submit" class="tambah-button">Tambah</button>
            </form>
            <div class="table-data">
                <div class="table-header">
                    <div>Barang</div>
                    <div>Lokasi</div>
                    <div>Deskripsi</div>
                    <div>Foto</div>
                    <div>Aksi</div>
                </div>
                @foreach ($laporan_hilang as $barang)
                <div class="table-row">
                    <div><a href="{{route('home.detail', ['barang' => $barang])}}"><p>{{$barang->nama_barang}}</p></a></div>
                    <div>{{$barang->lokasi}}</div>
                    <div>{{$barang->deskripsi}}</div>
                    <div>
                        <img src="{{url('temuan/'.$barang->foto_barang)}}" width="50"></div>
                    <div>
                        <a href="https://wa.me/{{ $barang->phone }}" target="_blank">
                            <img src="{{ URL::asset('assets/wa1.png') }}" alt="WhatsApp" width="50">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>