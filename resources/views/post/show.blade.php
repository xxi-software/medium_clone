<x-app-layout>
  <div class="py-4">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <h1 class="text-2xl mb-4">{{ $post->title }}</h1>
        <div class="flex items-center gap-4 mb-2">
          <x-user-avatar :user="$post->user" />
          <div>
            <div class="flex items-center gap-2">
              <a href="{{ route('profile.show', $post->user) }}"
                class="font-semibold hover:underline">{{ $post->user->name }}</a>
              <span class="text-gray-400">&middot;</span>
              <a href="#" class="text-emerald-600 font-medium hover:underline">Follow</a>
            </div>
            <div class="flex gap-2 text-gray-500 text-sm">
              {{ $post->readTime() }} min read
              &middot;
              {{ $post->created_at->format('M d, Y') }}
            </div>
          </div>
        </div>
        <x-clap-button :post="$post" class="mt-8" />
        <div class="mt-4">
          <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg">
        </div>
        <div class="mt-4 text-base text-gray-800">
          {{ $post->content }}
        </div>
        <div class="mt-8">
          <span class="px-4 py-2 bg-gray-400 rounded-lg">
            {{ $post->category ? $post->category->name : 'Uncategorized' }}
          </span>
        </div>
        <x-clap-button :post="$post" class="mt-8" />
      </div>
    </div>
  </div>
  </div>
</x-app-layout>