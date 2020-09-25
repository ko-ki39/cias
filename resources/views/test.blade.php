{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF18cyNI-lhyDb2IfLUJrpdBhi-O6Bktg&callback=initMap" async
    defer></script>
<style>
    html {
        height: 100%
    }

    body {
        height: 100%
    }

    #map {
        height: 100%;
        width: 100%
    }

</style>
</head> --}}
<body>
    <iframe width="500" height="500" frameborder="0" src="https://maps.google.co.jp/maps?output=embed&q=沖縄県立具志川職業能力開発校&t=m&hl=ja"></iframe>
    <div id="map"></div>

    <script>
        var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
        var Options = {
            zoom: 15, //地図の縮尺値
            center: MyLatLng, //地図の中心座標
            mapTypeId: 'roadmap' //地図の種類
        };
        var map = new google.maps.Map(document.getElementById('map'), Options);

    </script>
</body>
</div>
