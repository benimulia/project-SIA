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
        <h4 class="grey-text text-darken-1 center">Jurnal Umum</h4>
        <table>
        <thead class="grey-text text-darken-1">
                    <tr>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Ref</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody id="emp-table">
                        @foreach($salarydetails as $salarydetail)
                            <tr>
                                <td>{{$salarydetail->tgl_gaji}}</td>
                                <td>Beban Gaji</td>
                                <td>512</td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * 0.05}}</td>
                                <td></td>                                    
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kas</td>
                                <td>112</td>
                                <td></td>
                                <td>{{$salarydetail->salSalary->s_amount + $salarydetail->salTunjangan->jml_tunjangan - $salarydetail->salPotongan->jml_potongan - $salarydetail->salSalary->s_amount * 0.05}}</td>                                    
                            </tr>
                        @endforeach
                </tbody>
        </table>
    </body>
</html>