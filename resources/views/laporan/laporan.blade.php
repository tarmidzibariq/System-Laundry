<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laundry</title>

    <style>
        table {
        /* width: 100%; */
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Pesanan</h1>
    <table  style="width: 700px; margin: 50px auto;">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">TOTAL PESANAN</th>
                <th scope="col">TOTAL PENDAPATAN</th>
                {{-- <th scope="col">ACTION</th> --}}
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @for ($i = 0; $i < count($transaksi); $i++) <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ Carbon\Carbon::parse($transaksi[$i]['tgl'])->isoFormat("D MMMM Y") }}</td>
                <td>{{ $transaksi[$i]['jumlah'] }}</td>
                <td>Rp. {{ number_format($transaksi[$i]['total']) }}</td>
                {{-- <td>belum ada pendapatan</td> --}}
                </tr>
                @endfor

        </tbody>
    </table>
</body>

</html>
