@extends('master')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Google Maps API: Cara Menampilkan Lokasi dengan PHP dan MySQL</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initialize" async defer></script>
    <script type="text/javascript">
        var marker;

        function initialize() {
            // Variabel untuk menyimpan informasi lokasi
            var infoWindow = new google.maps.InfoWindow;
            //  Variabel berisi properti tipe peta
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            // Pembuatan peta
            var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
            // Variabel untuk menyimpan batas kordinat
            var bounds = new google.maps.LatLngBounds();
            // Pengambilan data dari database MySQL
            <
            ? php
            // Sesuaikan dengan konfigurasi koneksi Anda
            $host = "localhost";
            $username = "root";
            $password = "";
            $Dbname = "db_laundry";
            $db = new mysqli($host, $username, $password, $Dbname);

            $query = $db - > query("SELECT * FROM members ORDER BY alamat ASC");
            while ($row = $query - > fetch_assoc()) {
                $nama = $row["alamat"];
                $lat = $row["latitude"];
                $long = $row["longitude"];
                echo "addMarker($lat, $long, '$nama');\n";
            }
            ?>
            // Proses membuat marker 
            function addMarker(lat, lng, info) {
                var lokasi = new google.maps.LatLng(lat, lng);
                bounds.extend(lokasi);
                var marker = new google.maps.Marker({
                    map: peta,
                    position: lokasi
                });
                peta.fitBounds(bounds);
                bindInfoWindow(marker, peta, infoWindow, info);
            }
            // Menampilkan informasi pada masing-masing marker yang diklik
            function bindInfoWindow(marker, peta, infoWindow, html) {
                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.setContent(html);
                    infoWindow.open(peta, marker);
                });
            }
        }

    </script>
</head>

<body>

    <div id="googleMap" style="width:1100px;height:500px;"></div>

</body>

</html>
@endsection
