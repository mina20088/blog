{{-- User profile sidebar --}}
<aside class="xs:col-span-12 xl:col-span-3 xl:sticky xl:h-fit">
    <x-card class="bg-slate-50 h-fit  xl:py-3 xl:px-3">
        <div class="flex flex-col gap-4 divide-y">
            {{-- Profile image and basic info --}}
            <div class="xs:flex xs:gap-4 xs:justify-center xs:items-center xs:pb-4">
                <img
                    src="{{\Illuminate\Support\Facades\Storage::url($user->upload->path)}}"
                    height="300"
                    class="grid rounded-lg xs:w-24 xs:h-24 sm:w-48 md:w-32 h-auto"
                    alt="Profile Preview"
                />
                <div class="flex xs:flex-col xs:gap-2 xs:justify-center xs:basis-full">
                    <h1 class="text-xl font-bold">{{ $user->username }}</h1>
                    <p class="text-sm font-semibold">{{ $user->email }}</p>
                    {{-- Social media links --}}
                    <div class="flex xs:gap-2">
                        @if($user->profile->github_repo_url)
                            <x-link-button id="gitHub" class="social xs:w-fit xs:p-0 bg-slate-50"
                                           :tooltip="true" :tooltip-content="$user->profile->github_repo_url"
                                           :rounded_lg="true" :link="$user->profile->github_repo_url">
                                <i class="fa-brands fa-github fa-xl text-black"></i>
                            </x-link-button>
                            <x-tooltip id="social-tool-gitHub" class="tool"
                                       :tooltip-content="$user->profile->github_repo_url"/>
                        @endif
                        @if($user->profile->instagram_url)
                            <x-link-button id="instagram" class=" social xs:w-fit xs:p-0 bg-slate-50"
                                           :rounded_lg="true" :link="$user->profile->instagram_url">
                                <i class="fa-brands fa-instagram fa-xl text-black "></i>
                            </x-link-button>

                            <x-tooltip id="social-tool-instagram" class="tool"
                                       :tooltip-content="$user->profile->instagram_url"/>
                        @endif
                        @if($user->profile->x_url)
                            <x-link-button id="x" class="social xs:w-fit xs:p-0 bg-slate-50" :rounded_lg="true"
                                           :link="$user->profile->x_url">
                                <i class="fa-brands fa-x-twitter fa-xl text-black"></i>
                            </x-link-button>
                            <x-tooltip id="social-tool-twitter" class="tool"
                                       :tooltip-content="$user->profile->x_url"/>
                        @endif
                    </div>
                </div>
            </div>
            {{-- User bio --}}
            <div class="xs:w-full xs:pb-4">
                <p class="">{{ $user->profile->bio }}</p>
            </div>
            {{-- User details (location, member since) --}}
            <div class="flex flex-col gap-4 xs:pb-4 ">
                <div class="flex justify-between font-semibold text-justify">
                    <p>Location</p>
                    <p>{{ $user->profile->country }}, {{ $user->profile->state }}</p>
                </div>
                <div class="flex justify-between font-semibold text-justify">
                    <p> Member Since</p>
                    <p>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                </div>
            </div>
            {{-- Edit profile button --}}
            <div class="flex justify-center items-center xs:pb-4">
                <x-link-button class="flex justify-center items-center gap-2 bg-gray-800 xs:w-full xl:w-fit"
                               :rounded_xl="true">
                    <x-svgs.marker class="w-5 text-white"/>
                    <span>Edit Profile</span>
                </x-link-button>
            </div>
        </div>
    </x-card>
</aside>
