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
        <h4 class="grey-text text-darken-1 center">Laporan Penggajian</h4>
        <table>
        <thead class="grey-text text-darken-1">
                        <tr>
                            <th>Tanggal Penggajian</th>
                            <th>Nama Pegawai</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Gaji Pokok</th>
                            <th>PPH</th>
                            <th>Total_Gaji</th>
                        </tr>
                </thead>
                <tbody id="emp-table">
                @foreach($salary_details as $salarydetail)
                            <tr>
                                <td>{{$salarydetail->tgl_gaji}}</td>
                                <td>{{$salarydetail->salEmployee->first_name}} {{$salarydetail->salEmployee->last_name}}</td>
                                <td>{{$salarydetail->salTunjangan->tunjangan_name}} {{$salarydetail->salTunjangan->jml_tunjangan}}</td>
                                <td>{{$salarydetail->salPotongan->potongan_name}} {{$salarydetail->salPotongan->jml_potongan}}</td>
                                <td>{{$salarydetail->salSalary->s_amount}}</td>
                                <td>{{$salarydetail->pph}}</td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * 0.05}}</td>                                     
                            </tr>
                        @endforeach
                </tbody>
        </table>
    </body>
</html>