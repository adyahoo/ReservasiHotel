<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">Reservasi Hotel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}">Rh</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li>
                <a href="{{route('reservasi')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Reservasi</span></a>
            </li>
            <li>
                <a href="{{route('tamu')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Master Tamu</span></a>
            </li>
            <li>
                <a href="{{route('kamar')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Master Kamar</span></a>
            </li>
            <li>
                <a href="{{route('jenisKamar')}}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Master Jenis Kamar</span></a>
            </li>
    </aside>
</div>