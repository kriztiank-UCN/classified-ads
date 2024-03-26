<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <x-banner />

  <div class="w-full flex-col md:flex md:min-h-screen md:flex-row">
    {{-- ADMIN SIDEBAR START --}}
    {{-- https://github.com/jan-heise/responsive-navbar-with-dropdown/blob/master/public/sidebar.html --}}
    <div
      class="dark-mode:text-gray-200 dark-mode:bg-gray-800 flex w-full flex-shrink-0 flex-col bg-white text-gray-700 md:w-64"
      x-data="{ open: false }" @click.away="open = false">
      <div class="flex flex-shrink-0 flex-row items-center justify-between px-8 py-4">
        <a href="#"
          class="dark-mode:text-white focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-gray-900 focus:outline-none">Classified
          Admin</a>
        {{-- HAMBURGER MENU BUTTON --}}
        <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
            <path x-show="!open" fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      {{-- NAV LINKS --}}
      <nav :class="{ 'block': open, 'hidden': !open }" class="flex-grow px-4 pb-4 md:block md:overflow-y-auto md:pb-0">
        <x-app-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
          Dashboard </x-app-link>
        <x-app-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
          Categories </x-app-link>
        <div class="relative" x-data="{ open: false }" @click.away="open = false">
          <button
            class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:block"
            @click="open = !open">
            <span>{{ auth()->user()->name }}</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
              class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
          <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg">
            <div class="dark-mode:bg-gray-700 rounded-md bg-white px-2 py-2 shadow">
              <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="{{ route('profile.show') }}">Profile</a>
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                  href="{{ route('logout') }}" @click.prevent="$root.submit();">
                  Logout
                </a>
              </form>
            </div>
          </div>
        </div>
      </nav>
    </div>
    {{-- ADMIN SIDEBAR END --}}
    {{-- MAIN CONTENT --}}
    <main class="m-2 w-full p-2">
      <!-- Page Heading -->
      @if (isset($header))
        <header class="bg-white">
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $header }}
          </div>
        </header>
      @endif
      {{ $slot }}
    </main>
  </div>


  @stack('modals')

  @livewireScripts
</body>

</html>
