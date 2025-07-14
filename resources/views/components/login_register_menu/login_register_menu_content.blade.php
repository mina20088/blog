<!-- Dropdown Menu -->
<div class="
            fixed z-10 top-20
            xs:w-48 xs:right-3 sm:w-52 sm:right-4
            h-fit p-4
            bg-white rounded-lg shadow-lg
            transform origin-top
            transition-all duration-300 ease-out
        "
     x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-y-50"
     x-transition:enter-end="opacity-100 scale-y-100" x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-50"
     @click.outside="show = false">
    <div class="grid grid-flow-row gap-3">
        <!-- Login Link -->
        <x-buttons.link-button-gradiant-blue class="xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4" content="Login" href="{{ route('login') }}" :rounded_lg="true"/>

        <!-- Register Link -->
        <x-buttons.link-button-gradiant-orange class="xs:text-sm md:text-xl xs:px-5 xs:py-2.5 md:px-8 md:py-4" href="{{ route('register') }}" content="Register" :rounded_lg="true"/>
    </div>
</div>
