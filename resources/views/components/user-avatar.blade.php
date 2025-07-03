@props(['user', 'size' => 'w-12 h-12'])

<img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}'s Avatar" class="{{ $size }} rounded-full object-cover">
<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->