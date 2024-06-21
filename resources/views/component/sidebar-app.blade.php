<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('storage/favicon/' . $user->favicon) }}" alt="{{ $user->name }}" width="30" />
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Irham Apps</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('about*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Tentang">Tentang</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{ Request::is('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="menu-link">
                        <div data-i18n="Tentang Saya">Tentang Saya</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('about/services*') ? 'active' : '' }}">
                    <a href="{{ route('services') }}" class="menu-link">
                        <div data-i18n="Keahlian">Keahlian</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('about/team*') ? 'active' : '' }}">
                    <a href="{{ route('team') }}" class="menu-link">
                        <div data-i18n="Tim Penjarah Kos">Tim Penjarah Kos</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('about/tech-images*') ? 'active' : '' }}">
                    <a href="{{ route('tech-images') }}" class="menu-link">
                        <div data-i18n="Gambar Teknologi">Gambar Teknologi</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('resume*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Resume">Resume</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{ Request::is('resume/education*') ? 'active' : '' }}">
                    <a href="{{ route('education') }}" class="menu-link">
                        <div data-i18n="Pendidikan">Pendidikan</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('resume/experience*') ? 'active' : '' }}">
                    <a href="{{ route('experience') }}" class="menu-link">
                        <div data-i18n="Pengalaman">Pengalaman</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('resume/skills*') ? 'active' : '' }}">
                    <a href="{{ route('skills') }}" class="menu-link">
                        <div data-i18n="Keahlian">Skil</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ Request::is('portfolio*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Portfolio">Portfolio</div>
            </a>

            <ul class="menu-sub ">
                <li class="menu-item {{ Request::is('portfolio') ? 'active' : '' }}">
                    <a href="{{ route('portfolio') }}" class="menu-link">
                        <div data-i18n="List Portfolio">List Portfolio</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('portfolio/kategori*') ? 'active' : '' }}">
                    <a href="{{ route('category') }}" class="menu-link">
                        <div data-i18n="Kategori">Kategori</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('blog*') ? 'active' : '' }}">
            <a href="{{ route('blog') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('contact*') ? 'active' : '' }}">
            <a href="{{ route('contact') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Contact">List Kontak</div>
            </a>
        </li>

    </ul>
</aside>
