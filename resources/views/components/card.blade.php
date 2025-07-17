<section class="grid grid-flow-row xs:rounded-2xl bg-gray-50 xs:my-6 divide-y divide-gray-700">
    <header class="grid xs:grid-flow-col md:grid-flow-row md:justify-center xs:gap-4 xs:py-3 xs:px-6 md:px-4">
        <img src="{{ Vite::asset('resources/images/Aron.png') }}" class="xs:h-[100px] xs:w-full sm:w-full sm:h-36 md:w-full rounded-2xl">
        <div class="flex flex-col justify-center">
            <h3 class="font-bold md:text-sm sm:text-xl">minaremonshaker</h3>
            <p>Web Developer</p>
        </div>
    </header>
    <article class="grid grid-flow-col text-sm xs:py-3 xs:px-6 md:px-4">
        <p>Laravel developer specializing in building modern web applications with Laravel and Vite. Experienced in database management, RESTful API development, and UI optimization. Passionate about clean code,</p>
    </article>
    <section class="grid xs:py-6 xs:gap-2 xs:px-6 md:px-4">
        <div class="grid grid-cols-2 items-center justify-around ">
            <span class="flex items-center gap-2 text-sm ">
                <x-svgs.pin class="w-5"/> Location
            </span>
            <p class="text-end text-sm">Egypt ,Cairo</p>
        </div>
        <div class="grid grid-cols-2 items-center justify-around">
            <span class="flex items-center gap-2 text-sm">
                <x-svgs.time class="w-5"/> Member
            </span>
            <p class="text-sm text-end">3 weeks ago</p>
        </div>
    </section>
    <section class="flex justify-center xs:py-3 xs:px-6">
        <x-buttons.link-button-gradiant-blue class="xs:w-full text-nowrap xl:w-1/2 xs:px-12" href="#" content="Edit Profile" :rounded_lg="true"/>
    </section>
</section>
