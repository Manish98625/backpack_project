{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" :link="backpack_url('user')" />
<x-backpack::menu-item title="Students" icon="la la-graduation-cap" :link="backpack_url('student')" />
<x-backpack::menu-dropdown title="Students item" icon="la la-group">
    <x-backpack::menu-dropdown-item title="Genders" icon="la la-venus-mars" :link="backpack_url('gender')" />
    <x-backpack::menu-dropdown-item title="Skills" icon="la la-check" :link="backpack_url('skill')" />
    <x-backpack::menu-dropdown-item title="States" icon="la la-map" :link="backpack_url('state')" />
    <x-backpack::menu-dropdown-item title="District" icon="la la-map" :link="backpack_url('district')" />
    <x-backpack::menu-dropdown-item title="Cities" icon="la la-map-marker" :link="backpack_url('cities')" />
    
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Addons" icon="la la-group">
    <x-backpack::menu-dropdown title="News" icon="la la-newspaper-o">
        <x-backpack::menu-dropdown-item title="Articles" icon="
la la-pencil-square-o" :link="backpack_url('articles')" />
        <x-backpack::menu-dropdown-item title="Blogs" icon="la la-blog" :link="backpack_url('blog')" />
        <x-backpack::menu-dropdown-item title="Categories" icon="la la-list" :link="backpack_url('categories')" />
    </x-backpack::menu-dropdown>
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
