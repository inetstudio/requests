<li class="{{ isActiveRoute('back.requests.*', 'mm-active') }}">
    <a href="#" aria-expanded="false"><i class="fa fa-book"></i> <span class="nav-label">Заявки</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        @include('admin.module.requests.forms::back.includes.package_navigation')
        @include('admin.module.requests.messages::back.includes.package_navigation')
    </ul>
</li>
