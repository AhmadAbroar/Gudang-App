<!DOCTYPE html>
<html>
<head>
    <title>Barang Masuk Report</title>
</head>
<body>
    <h1>Barang Masuk Report</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Pegawai</th>
                <th>Distributor</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangMasuks as $barangMasuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barangMasuk->user->name }}</td>
                    <td>{{ $barangMasuk->distributor->nama_distributor }}</td>
                    <td>{{ $barangMasuk->barang->nama_barang }}</td>
                    <td>{{ $barangMasuk->jumlah }}</td>
                    <td>{{ $barangMasuk->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>