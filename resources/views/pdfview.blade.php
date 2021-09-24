<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body style="font-family: 'DejaVu Sans'">
    <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
    <div class="container-full-width">
                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate('www.google.com.ua') !!}
        <div class="row">
            <div class="col-4">{!!
                    \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->wiFi([
                        'ssid' => 'Esprit@Home',
                        'encryption' => 'WPA2',
                        'password' => 'alexey1977'
                    ])
                !!}</div>
            <div class="col-4">
                <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aW5kaWF8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80" height="200" width="300" alt="">
            </div>
            <div class="col-4">3213123213213123123213</div>
        </div>

        <br>
        <br>
        <player></player>
    </div>
    <table>
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>PHONE</td>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td class="id">{{ $item->id }}</td>
                <td class="name">{{ $item->username }}</td>
                <td class="phone">{{ $item->phone }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>

<style>
    .id{
        width: 100px;
    }
    .name{
        width: 300px;
    }
    td {
        border: 1px solid black;
    }
</style>
