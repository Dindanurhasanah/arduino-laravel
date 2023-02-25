 <div class="sidebar" data-color="blue" data-image="{{asset('assets')}}/img/sidebar-4.jpg">
     
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                {{-- <img src="{{ asset('assets') }}/img/LogoArduino.png" class="brand-image img-circle elevation-3" style="float:left opacity: .8"> --}}
                    <a class=" simple-text" href="home">DF Arduino</a>
                     
            </div>

            <ul class="nav">
                <li class="{{Request::is('home')? 'active': '' }}">
                    <a href="{{ route('home') }}">
                        <i class="pe-7s-home"></i>
                        <p style="color: white">Home</p>
                    </a>
                </li>
                <li class="{{Request::is('userprofile')? 'active': '' }}">
                    <a href="{{ route('userprofile') }}"> 
                        <i class="pe-7s-user"></i>
                        <p style="color: white">My Profile</p>
                    </a>
                </li>
                <li class="{{Request::is('laporan')? 'active': '' }}">
                    <a href="/laporan">
                        <i class="pe-7s-note2"></i>
                        <p style="color: white"> Laporan</p>
                    </a>
                </li>
                <li class="{{Request::is('infografis')? 'active': '' }}">
                    <a href="/infografis">
                        <i class="pe-7s-photo"></i>
                        <p style="color: white">Dokumentasi</p>
                    </a>
                </li>
                <li class="{{Request::is('grafik')? 'active': '' }}">
                    <a href="{{ route('grafik') }}">
                        <i class="pe-7s-graph3"></i>
                        <p style="color: white">Grafik</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>
