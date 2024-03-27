<header class="body-font text-gray-600">
  <div class="container mx-auto flex flex-col flex-wrap items-center p-5 md:flex-row">
    <a class="title-font mb-4 flex items-center font-medium text-gray-900 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="2" class="h-10 w-10 rounded-full bg-indigo-500 p-2 text-white"
        viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Classified</span>
    </a>
    <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
      <a class="mr-5 hover:text-gray-900">Home</a>
      <a class="mr-5 hover:text-gray-900">All Ads</a>
      <a class="mr-5 hover:text-gray-900">Stores</a>
      <a class="mr-5 hover:text-gray-900">Contact</a>
      @guest
      <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">login</a>
      <a href="{{ route('register') }}" class="mr-5 hover:text-gray-900">Register</a>
      @endguest
      @auth
        <a class="mr-5 hover:text-gray-900">{{ auth()->user()->name }}</a>
      @endauth
    </nav>
    <button
      class="mt-4 inline-flex items-center rounded border-0 bg-green-500 px-3 py-1 text-base font-semibold text-gray-50 hover:bg-green-400 focus:outline-none md:mt-0">Post
      New Ad
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        class="ml-1 h-4 w-4" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
