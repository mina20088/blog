<section x-data="{ update:false , hasError: @json(session('errors')) , width: window.innerWidth }">
    <div class="grid  xs:gap-3 items-center" :class="update ?'xs:grid-cols-[1fr_3fr]' : 'xs:grid-cols-[1fr_3fr_1fr]'">
        <h1 class="font-bold xs:col-span-1 md:grid-cols-1 md:order-1">username:</h1>
        <template x-if="!update">
            <p class="xs:col-span-1 md:order-2">{{ $user->username }}</p>
        </template>
        <div class="grid xs:col-span-1 xs:justify-end md:order-3">
            <x-button @click="update = !update" class="bg-yellow-300 text-white xs:px-2 xs:py-2 xs:order-4" :rounded_xl="true" content="edit"/>
        </div>

        <template x-if="update || hasError">
            <div class="xs:col-span-3 md:col-span-2 md:order-3">
                <form method="post" id="update-username"
                      action="{{ route('dashboard.users.username.update' , ['user' => $user]) }}"
                      class="m-0">
                    @method('PATCH')
                    @csrf
                    <div class="flex gap-3">
                        <div class="basis-full">
                            <x-input id="username" type="text" name="username"
                                     value="{{ $user->username }}"/>
                        </div>

                        <x-button type="submit" class="bg-black text-white h-fit xs:px-2 xs:py-2"
                                  :rounded_xl="true"
                                  content="update"/>
                    </div>
                    <x-single-error field-name="username" class="text-xs text-nowrap"/>
                </form>
            </div>

        </template>
    </div>
</section>

