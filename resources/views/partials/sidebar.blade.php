<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text">Company</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-fw fa-tachometer-alt"></i><span>Панель</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Разделы
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
           aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Компания И Сотрудники</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="collapseOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('company.index') }}">Компания</a>
                <a class="collapse-item" href="{{ route('employee.index') }}">Сотрудники</a>
            </div>
        </div>
    </li>


{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"--}}
{{--           aria-expanded="true" aria-controls="collapseThree">--}}
{{--            <i class="fas fa-fw fa-cog"></i>--}}
{{--            <span>Book</span>--}}
{{--        </a>--}}
{{--        <div id="collapseThree" class="collapse" aria-labelledby="collapseThree" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('page.index') }}">Pages</a>--}}
{{--                <a class="collapse-item" href="{{ route('section.index') }}">Sections</a>--}}
{{--                <a class="collapse-item" href="{{ route('unit.index') }}">Units</a>--}}
{{--                <a class="collapse-item" href="{{ route('paragraph.index') }}">Paragraph</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
