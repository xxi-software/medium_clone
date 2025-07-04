<x-app-layout>
  <div class="py-4">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <form action="{{ route("post.store") }}" enctype="multipart/form-data" method="post">
          @csrf
          <!--Image-->
          <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image"
              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              type="file" name="image" :value="old('image')" autofocus />
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
              800x400px).</p>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
          </div>
          <!--Title-->
          <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
              autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
          </div>
          <!--Category-->
          <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />
            <select id="category_id" name="category_id"
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
              <option value="">Select a Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <x-input-error :messages=" $errors->get('category_id')" class="mt-2" />
          </div>
          <!--Content-->
          <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />
            <x-input-textarea id="content" class="block mt-1 w-full" name="content" :value="old('content')" />
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
          </div>
          <x-primary-button class="mt-4">Submit</x-primary-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>