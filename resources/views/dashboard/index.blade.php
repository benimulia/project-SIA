@extends('layouts.app')
@section('content')
    <br>
    <div>
        <div class="row white-text">
            <a href="/admins" class="white-text">
                <div class="mx-20 card-panel pink lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Admin</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_admins}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/employees" class="white-text">
                <div class="mx-20 card-panel teal lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person_outline</i>
                            <h6 class="no-padding txt-md">Pegawai</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_employees}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/departments" class="white-text">
                <div class="mx-20 card-panel red lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">business</i>
                            <h6 class="no-padding txt-md">Departemen</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_departments}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/cities" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel purple lighten-1 col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">location_city</i>
                            <h6 class="no-padding txt-md">Kota</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_cities}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/countries" class="white-text">
                <div class="mx-20 card-panel light-blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">terrain</i>
                            <h6 class="no-padding txt-md">Negara</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_countries}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/salaries" class="white-text hide-on-small-only">
                <div class="card-panel green col s8 offset-s2 m4 l4 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">attach_money</i>
                            <h6 class="no-padding txt-md">Gaji Pokok</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_salaries}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/states" class="white-text hide-on-small-only">
                <div class="card-panel blue col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 mx-20">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">grid_on</i>
                            <h6 class="no-padding txt-md">Provinsi</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_states}})</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/divisions" class="white-text hide-on-small-only">
                <div class="mx-20 card-panel orange col s8 offset-s2 m4 l4 xl2">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">business</i>
                            <h6 class="no-padding txt-md">Divisi</h6>
                        </div>
                        <div class="col s5 xl5">
                            <p class="no-padding center mt txt-sm">Total({{$t_divisions}})</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-panel">
            <canvas id="employee"></canvas>
        </div>
    </div>
    <br>
    {{-- include the chart.js Library --}}
    <script src="{{asset('js/Chart.js')}}"></script>
    
    {{-- Create the chart with javascript using canvas --}}
    <script>
        // Get Canvas element by its id
        employee_chart = document.getElementById('employee').getContext('2d');
        chart = new Chart(employee_chart,{
            type:'line',
            data:{
                labels:[
                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    '{{Carbon\Carbon::now()->subMonths(4)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}'
                    ],
                datasets:[{
                    label:'Grafik Pegawai 4 Bulan Terakhir',
                    data:[
                        '{{$emp_count_4}}',
                        '{{$emp_count_3}}',
                        '{{$emp_count_2}}',
                        '{{$emp_count_1}}'
                    ],
                    backgroundColor: [
                        'rgba(178,235,242 ,1)'
                    ],
                    borderColor: [
                        'rgba(0,150,136 ,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection