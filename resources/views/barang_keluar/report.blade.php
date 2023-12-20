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
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangKeluars as $barangKeluar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barangKeluar->user->name }}</td>
                    <td>{{ $barangKeluar->barang->nama_barang }}</td>
                    <td>{{ $barangKeluar->jumlah }}</td>
                    <td>{{ $barangKeluar->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>