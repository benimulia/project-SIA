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
        <h4 class="grey-text text-darken-1 center">Laporan Pegawai</h4>
        <table>
            <thead class="grey-text text-darken-1">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>Kode Pos</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Gaji Pokok</th>
                    <th>Departemen</th>
                    <th>Divisi</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->empCity->zip_code}}</td>
                        <td>{{$employee->empCountry->country_name}}</td>
                        <td>{{$employee->empState->state_name}}</td>
                        <td>{{$employee->empCity->city_name}}</td>
                        <td>{{$employee->empSalary->s_amount}}</td>
                        <td>{{$employee->empDepartment->dept_name}}</td>
                        <td>{{$employee->empDivision->division_name}}</td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->join_date}}</td>
                        <td>{{$employee->birth_date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>