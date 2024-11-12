<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
@if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admins','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif




<!--userrole_start_route-->
@if(admin()->user()->role("userrole_show"))
<li class="nav-item {{active_link('userrole','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('userrole','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.userrole')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('userrole')}}" class="nav-link  {{active_link('userrole','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.userrole')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('userrole/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--userrole_end_route-->



<!--joborders_start_route-->
@if(admin()->user()->role("joborders_show"))
<li class="nav-item {{active_link('joborders','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('joborders','active')}}">
    <i class="nav-icon fa fa-file-invoice"></i>
    <p>
      {{trans('admin.joborders')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('joborders')}}" class="nav-link  {{active_link('joborders','active')}}">
        <i class="fa fa-file-invoice nav-icon"></i>
        <p>{{trans('admin.joborders')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('joborders/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--joborders_end_route-->





<!--bookfile_start_route-->
@if(admin()->user()->role("bookfile_show"))
<li class="nav-item {{active_link('bookfile','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('bookfile','active')}}">
    <i class="nav-icon fa fa-file-alt"></i>
    <p>
      {{trans('admin.bookfile')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('bookfile')}}" class="nav-link  {{active_link('bookfile','active')}}">
        <i class="fa fa-file-alt nav-icon"></i>
        <p>{{trans('admin.bookfile')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('bookfile/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--bookfile_end_route-->
