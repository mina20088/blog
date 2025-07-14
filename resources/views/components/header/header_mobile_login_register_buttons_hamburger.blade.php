<!-- Mobile Auth Dropdown & Hamburger -->
<div
    class="
      md:hidden h-full grid grid-flow-col items-center
      xs:justify-end xs:gap-2
      md:justify-center
    "
>

    <div>{{ $authentication_dropdown }}</div>
 {{--   <x-auth-dropdown />--}}
    <a href="#" id="sidebar-button">
        <x-svgs.menu-hamburger class="text-white w-6" />
    </a>
</div>
