<x-app-layout>
  <div class="py-4">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900">
          <x-category-tabs />
        </div>
      </div>
      <div class="mt-8 text-gray-900">
        @forelse ($posts as $p)
        <x-post-item :post="$p" />
        @empty
        <div class="text-center text-gray-400 py-16">
          No posts found.
        </div>
        @endforelse
      </div>
      {{ $posts->onEachSide(1)->links() }}
    </div>
  </div>
</x-app-layout>