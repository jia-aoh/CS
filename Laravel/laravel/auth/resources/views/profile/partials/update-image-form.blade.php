  <style>
    .profilephoto {
      object-fit: cover;
      object-position: center;
      height: 200px;
      width: 200px;
    }
  </style>

<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ __('Head Photo') }}
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      {{ __("Update your account's head photo.") }}
    </p>
  </header>
  <!-- 放上圖片 -->
  <img src="{{$user->image}}" class="profilephoto rounded-lg" alt="">
  <!-- action route 會連動機制要修改 -->
  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <!-- 讓其他欄位一起帶過去database -->
    <input type="hidden" name="name" value="{{$user->name}}">
    <input type="hidden" name="email" value="{{$user->email}}">
    <input type="hidden" name="phone" value="{{$user->phone}}">
    <div>
      <!-- __會去抓不同語系 -->
      <x-input-label for="image" :value="__('Image')" />
      <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
      <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      @if (session('status') === 'profile-updated')
      <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
      @endif
    </div>
  </form>
</section>