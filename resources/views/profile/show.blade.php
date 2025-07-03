<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="flex">
          <div class="flex-1"></div>
          <div class="w-[320px] border-l px-8">
            <x-user-avatar :user="$user" size="w-24 h-24" />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>