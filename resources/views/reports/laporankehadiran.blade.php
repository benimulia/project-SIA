<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{public_path('css/materialize.css')}}">
        <title>Sistem MSDM</title>
        <style>
            td{
                border-top:#9e9e9e 1px solid !important;
                border-bottom:#9e9e9e 1px solid !important;
                border-right:#e0e0e0 1px solid !important;
                border-left:#e0e0e0 1px solid !important; 
            }
            th{
                border-bottom:#212121 1px solid !important;
                border-top:#212121 1px solid !important;
                border-right:#9e9e9e 1px solid !important;
                border-left:#9e9e9e 1px solid !important;
            }
        </style>
    </head>
    <body>
        <h4 class="grey-text text-darken-1 center">Laporan Kehadiran</h4>
        <table>
            <thead class="grey-text text-darken-1">
                <tr>
                    <th>Tanggal Kehadiran</th>
                    <th>Nama</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kehadirans as $kehadiran)
                    <tr>
                        <td>{{$kehadiran->tgl_kehadiran}}</td>
                        <td>{{$kehadiran->empKehadiran->first_name}} {{$kehadiran->empKehadiran->last_name}}</td>
                        <td>{{$kehadiran->jam_masuk}}</td>
                        <td>{{$kehadiran->jam_keluar}}</td>
                        <td>{{$kehadiran->keterangan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>