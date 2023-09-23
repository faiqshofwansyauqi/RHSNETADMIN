<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
            <a class="nav-link " a href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-router-fill "></i><span>Hotspot</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse {{ request()->is(['dashboard/userprofile','dashboard/active','dashboard/user']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/userprofile" class="{{ request()->is(['dashboard/userprofile']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Users Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/user" class="{{ request()->is(['dashboard/user']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/active" class="{{ request()->is(['dashboard/active']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Users Active</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear-fill"></i><span>Pengaturan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse {{ request()->is(['dashboard/pengaturan']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dashboard/pengaturan" class="{{ request()->is(['dashboard/pengaturan']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Mikrotik</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/pengaturan" class="{{ request()->is(['dashboard/pengaturan']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Personal</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/pengaturan" class="{{ request()->is(['dashboard/pengaturan']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Share Profit</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="/dashboard/omset">
          <i class="bi bi-file-earmark-text-fill"></i>
          <span>Report</span>
        </a>
      </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="icons-bootstrap.html">
                        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-remix.html">
                        <i class="bi bi-circle"></i><span>Remix Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-boxicons.html">
                        <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav --> --}}
</aside>