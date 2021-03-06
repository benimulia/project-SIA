<ul id="slide-out" class="sidenav sidenav-fixed grey lighten-4">
    <li>
        <div class="user-view">
            <div class="background">
            </div>
            {{-- Get picture of authenicated user --}}
            <a href="{{route('auth.show')}}"><img class="circle" src="{{asset('storage/admins/'.Auth::user()->picture)}}"></a>
            {{-- Get first and last name of authenicated user --}}
            <a href="{{route('auth.show')}}"><span class="white-text name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a>
            {{-- Get email of authenicated user --}}
            <a href="{{route('auth.show')}}"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/dashboard"><i class="material-icons">dashboard</i>Dashboard</a>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/kehadirans"><i class="material-icons">fingerprint</i>Kehadiran</a>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/employees"><i class="material-icons">supervisor_account</i>Manajemen Pegawai</a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header"><i class="material-icons pl-15">settings</i><span class="pl-15">Manajemen Sistem</span></a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="/departments" class="waves-effect waves-grey">
                                <i class="material-icons">business</i>
                                Departemen
                            </a>
                        </li>
                        <li>
                            <a href="/salaries" class="waves-effect waves-grey">
                                <i class="material-icons">attach_money</i>
                                Gaji
                            </a>
                        </li>
                        <li>
                            <a href="/tunjangans" class="waves-effect waves-grey">
                                <i class="material-icons">add_circle</i>
                                Tunjangan
                            </a>
                        </li>
                        <li>
                            <a href="/potongans" class="waves-effect waves-grey">
                                <i class="material-icons">money_off</i>
                                Potongan
                            </a>
                        </li>
                        <li>
                            <a href="/divisions" class="waves-effect waves-grey">
                            <i class="material-icons">business</i>
                                Divisi
                            </a>
                        </li>
                        <li>
                            <a href="/cities" class="waves-effect waves-grey">
                            <i class="material-icons">location_city</i>
                                Kota / Kabupaten
                            </a>
                        </li>
                        <li>
                            <a href="/states" class="waves-effect waves-grey">
                            <i class="material-icons">grid_on</i>
                                Provinsi
                            </a>
                        </li>
                        <li>
                            <a href="/countries" class="waves-effect waves-grey">
                            <i class="material-icons">terrain</i>
                                Negara
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <a class="waves-effect waves-grey" href="/salarydetails"><i class="material-icons">attach_money</i>Detail Gaji</a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header"><i class="material-icons pl-15">assignment</i><span class="pl-15">Laporan</span></a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="/reports" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Laporan Pegawai
                            </a>
                        </li>
                        <li>
                            <a href="/reportgaji" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Laporan Penggajian
                            </a>
                        </li>
                        <li>
                            <a href="/reportkehadiran" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Laporan Kehadiran
                            </a>
                        </li>
                        <li>
                            <a href="/reportjurnal" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Jurnal Umum
                            </a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect waves-grey">
                                <i class="material-icons">insert_drive_file</i>
                                Buku Besar
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <a href="/admins" class="waves-effect waves-grey"><i class="material-icons">account_circle</i>Manajemen Admin</a>
    </li>
</ul>
