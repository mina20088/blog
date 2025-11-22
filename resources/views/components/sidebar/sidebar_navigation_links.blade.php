<!-- Navigation Links -->
<div class="grid grid-flow-row gap-1">
    <a href="{{ route('home') }}" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <x-svgs.home class="w-6"/>
            </span>
            <span>
                 Home
           </span>
        </div>

    </a>
    <a href="{{ route('about') }}" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <x-svgs.info class="w-6"/>
            </span>
            <span>
                About
            </span>
        </div>
    </a>
    <a href="{{ route('contact') }}" class="text-white text-xl font-bold px-2 py-3 hover:bg-zinc-400 hover:rounded-lg">
        <div class="flex gap-2 items-center">
            <span>
                <x-svgs.contact class="w-6"/>
            </span>
            <span>
                Contact
            </span>
        </div>
    </a>
</div>
