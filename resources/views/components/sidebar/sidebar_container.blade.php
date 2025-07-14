
<!-- Sidebar Container -->
<div
    id="sidebar"
    class="
    fixed left-0 top-0 z-40
    h-screen
    xs:w-full md:w-1/2
    bg-zinc-700
    overflow-y-auto
    transition-transform
    -translate-x-full
    md:hidden
  "
    tabindex="-1"
    aria-hidden="false"
>
    <div class="grid grid-flow-row gap-12 px-4 py-6">
        {{  $slot }}
    </div>
</div>
