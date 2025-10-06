<x-card>

    <section class="flex xs:flex-col md:flex-row gap-3 items-center w-full">

        {{-- Profile Picture Upload --}}


        <img
            src="{{ Vite::asset('resources/images/Aron.png') }}"
            height="300"
            class="sm:hidden md:grid rounded-lg xs:w-80 sm:w-48 md:w-72 h-auto"
            alt="Profile Preview"
        />

        <section class="xs:hidden sm:grid sm:grid-cols-3  sm:gap-3 md:hidden">
            <section class="w-full">
                <img
                    src="{{ Vite::asset('resources/images/Aron.png') }}"
                    height="300"
                    class="rounded-lg xs:w-80 sm:w-48 md:w-72 h-auto"
                    alt="Profile Preview"
                />
            </section>

            <section class="xs:hidden sm:grid sm:grid-rows-[auto_36fr_1fr]  sm:col-span-2 sm:gap-4">
                <section class="font-bold text-xl w-full">
                    <h1>Personal Information</h1>
                </section>

                <section class="grid grid-flow-row">
                    <div>
                        <x-label for="first_name" content="First Name"/>
                        <x-input type="text" id="first_name" name="first_name" placeholder="First Name" />
                    </div>
                    <div>
                        <x-label for="last_name" content="Last Name"/>
                        <x-input type="last_name" id="last_name" name="last_name" placeholder="Last Name" />
                    </div>
                </section>
            </section>
        </section>

        <section class="w-full grid items-start gap-2">

            <section class="sm:hidden md:block font-bold text-xl">
                <h1>Personal Information</h1>
            </section>

            <section class="grid xs:grid-cols-1 sm:hidden md:grid md:grid-cols-2 md:gap-3">
                <div>
                    <x-label for="first_name" content="First Name"/>
                    <x-input type="text" id="first_name" name="first_name" placeholder="First Name" />
                </div>
                <div>
                    <x-label for="last_name" content="Last Name"/>
                    <x-input type="last_name" id="last_name" name="last_name" placeholder="Last Name" />
                </div>
            </section>

            <x-label for="profile_image" content="Upload picture"/>
            <x-input type="file" id="profile_image" class="p-0" name="profile_picture"/>
            <x-single-error fieldName="profile_picture"/>

            <x-label for="bio" content="Bio"/>
            <x-text-area id="bio" :rows="9" name="bio" placeholder="Add Bio..."/>
            <x-single-error fieldName="bio"/>

        </section>

    </section>
    <section>
        <x-label for="git_hub_link" content="Git Hub"/>
        <x-input id="git_hub_link" type="text" name="github_repo_url" placeholder="add github link"/>
        <x-single-error fieldName="github_repo_url"/>
    </section>

    <section class="grid grid-cols-2 md:gap-3">
        <section>
            <x-label for="Date_Of_Birth" content="Date Of Birth"/>
            <x-input type="date" id="Date_Of_Birth" name="date_of_birth" placeholder="DOB" />
        </section>
        <section>
            <x-label for="gender" content="Gender"/>
            <x-select id="gender" name="gender">
                <x-option value="" content="Choose Gender"/>
                @foreach(\App\Enums\Gender::cases() as $gender)
                    <x-option :value="$gender->value" :content="$gender->name"/>
                @endforeach
            </x-select>
        </section>

    </section>

    <section class="grid grid-cols-2 md:gap-3">

    </section>



</x-card>
