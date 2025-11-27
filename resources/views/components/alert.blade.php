
@props([
    'type',
    'message'
])

  <template x-data="{hideAlert: false}" x-if="!hideAlert">
      <div {{ $attributes->class([
     'grid h-20 xs:w-full bg-green-700 items-center text-white xs:px-5 rounded-lg',
     'bg-green-700' => $type === 'success',
     'bg-yellow-500' => $type === 'warning',
     'bg-red-600' => $type === 'danger'
    ])->merge(['class' => '']) }}>
          <div class="grid grid-cols-2 w-full justify-between items-center">
              <p class="basis-1/2">{{$message}}</p>
              <a @click="hideAlert = true" class="basis-1/2 text-end" href="#"><i class="fa-solid fa-xmark"></i></a>
          </div>
      </div>
  </template>





