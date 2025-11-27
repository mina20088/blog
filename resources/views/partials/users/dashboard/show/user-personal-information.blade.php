<section id="personal-information"
         class="xs:col-span-12 xl:grid xl:grid-flow-row xl:col-span-9 xl:h-screen xl:overflow-x-scroll scroll-smooth">
    <x-card class="bg-white">
        <h1 class="text-3xl font-bold ">Personal Information</h1>
        {{-- User's first name, last name, username, and email --}}
        <section class="flex flex-col gap-3 border rounded-lg xs:py-4 xs:px-4">
            <div class="flex xs:gap-3 xs:items-center xs:justify-between">
                <h1 class="font-bold">First Name :</h1>
                <p>{{ $user->first_name }}</p>
            </div>
            <div class="flex xs:gap-3 xs:items-center xs:justify-between ">
                <h1 class="font-bold">Last Name:</h1>
                <p>{{ $user->last_name }}</p>
            </div>
            {{-- Username update form --}}
            @include('partials.users.dashboard.show.user-username-update-form')
            {{-- Email update form --}}
            @include('partials.users.dashboard.show.user-email-update-form')
        </section>
    </x-card>
</section>
