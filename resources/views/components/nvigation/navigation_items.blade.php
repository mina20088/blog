<ul class="grid grid-cols-3 gap-5 text-white text-center">
    <li>
        <x-nvigation.navigation_item_link
            class="md:text-sm font-bold text-center"
            href="{{ route('home') }}"
            name="Home"
        />
    </li>
    <li>
        <x-nvigation.navigation_item_link
            class="md:text-sm font-bold text-center"
            href="{{ route('about') }}"
            name="About"
        />
    </li>
    <li>
        <x-nvigation.navigation_item_link
            class="md:text-sm font-bold text-center"
            href="{{ route('contact') }}"
            name="Contact"
        />
    </li>
</ul>
