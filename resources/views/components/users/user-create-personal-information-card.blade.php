<x-card>

    <section class="flex xs:flex-col md:flex-row gap-3 items-center w-full">
        <section class="w-full grid items-start gap-2">

            <section class="sm:hidden md:block font-bold text-xl">
                <h1>Personal Information</h1>
            </section>

            <section class="grid xs:grid-cols-1  md:grid md:grid-cols-2 md:gap-3">
                <div>
                    <x-label for="first_name" content="First Name"/>
                    <x-input type="text" id="first_name" name="first_name" placeholder="First Name"
                             :value="old('first_name')"/>
                    <x-single-error field-name="first_name"/>
                </div>
                <div>
                    <x-label for="last_name" content="Last Name"/>
                    <x-input type="text" id="last_name" name="last_name" placeholder="Last Name"
                             :value="old('last_name')"/>
                    <x-single-error field-name="last_name"/>
                </div>
            </section>

            <x-label for="profile_image" content="Upload picture"/>
            <x-file-input :large="true" id="profile_image" name="profile_picture" :value="old('profile_image')"/>
{{--            <x-input type="file" id="profile_image" class="!p-0" name="profile_picture"
                     :value="old('profile_picture')"/>--}}
            <x-single-error field-name="profile_picture"/>

            <x-label for="bio" content="Bio"/>
            <x-text-area id="bio" :rows="9" name="bio" placeholder="Add Bio..." :value="old('bio')"/>
            <x-single-error field-name="bio"/>

        </section>

    </section>
    <section>
        <x-label for="git_hub_link" content="Git Hub"/>
        <x-input id="git_hub_link" type="url" name="github_repo_url" placeholder="add github link"
                 :value="old('github_repo_url')"/>
        <x-single-error fieldName="github_repo_url"/>
    </section>

    <section class="grid grid-cols-2 md:gap-3">
        <section>
            <x-label for="Date_Of_Birth" content="Date Of Birth"/>
            <x-input type="date" id="Date_Of_Birth" name="date_of_birth" placeholder="DOB"
                     :value="old('date_of_birth')"/>
            <x-single-error fieldName="date_of_birth"/>
        </section>
        <section>
            <x-label for="gender" content="Gender"/>
            <x-select id="gender" name="gender">
                <x-option value="" content="Choose Gender" :selected="old('gender') === ''"/>
                @foreach(\App\Enums\Gender::cases() as $gender)
                    <x-option :value="$gender->value" :content="$gender->name"
                              :selected="old('gender') === (string)$gender->value"/>
                @endforeach
            </x-select>
            <x-single-error fieldName="gender"/>
        </section>

    </section>

    <section class="grid grid-flow-row md:gap-3">
        <section>
            <x-label for="phone" content="Phone"/>
            <x-input type="text" id="phone" name="phone_number" class="!w-full" :value="old('phone_number')"/>
            @ds(old('phone_number'))
            <x-single-error fieldName="phone_number"/>
        </section>

    </section>


</x-card>


