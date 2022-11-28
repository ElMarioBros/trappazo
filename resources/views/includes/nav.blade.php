<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trappazo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
          <!-- Loading screen -->
          <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-indigo-800"
          >
            Cargando.....
          </div>
  
          <!-- Sidebar -->
          <div class="flex flex-shrink-0 transition-all">
            <div
              x-show="isSidebarOpen"
              @click="isSidebarOpen = false"
              class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
            ></div>
            <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>
  
            <!-- Mobile bottom bar -->
            <nav
              aria-label="Options"
              class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white border-t border-indigo-100 sm:hidden shadow-t rounded-t-3xl"
            >
              <!-- Menu button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
              >
                <span class="sr-only">Toggle sidebar</span>
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
  
              <!-- Logo -->
              <a href="#">
                <img
                  class="w-10 h-auto rounded-lg"
                  src="https://imagizer.imageshack.com/img922/3696/0TYcXs.png"
                  alt="Trappazo"
                />
              </a>
  
              <!-- User avatar button -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-8 h-8 rounded-lg shadow-md"
                    src="http://ronaldmottram.co.nz/wp-content/uploads/2019/01/default-user-icon-8.jpg"
                    alt="User"
                  />
                  <span class="sr-only">Menú</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                    <a href="
                    @auth
                    {{ route('my-profile') }}
                    @else
                    {{ route('dashboard') }}
                    @endauth
                    " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>

                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <a href="#" onclick="this.closest('form').submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cerrar Sesión</a>                      
                    </form>
                    @endauth

                </div>
              </div>
            </nav>
  
            <!-- Left mini bar -->
            <nav
              aria-label="Options"
              class="z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-white border-r-2 border-indigo-100 shadow-md sm:flex rounded-tr-3xl rounded-br-3xl"
            >
              <!-- Logo -->
              <div class="flex-shrink-0 py-4">
                <a href="#">
                  <img
                    class="w-10 h-auto"
                    src="https://imagizer.imageshack.com/img922/3696/0TYcXs.png"
                    alt="Trappazo"
                  />
                </a>
              </div>
              <div class="flex flex-col items-center flex-1 p-2 space-y-4">
                <!-- Menu button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                  class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
                >
                  <span class="sr-only">Toggle sidebar</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                  </svg>
                </button>
                <!-- Messages button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                  class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
                >
                  <span class="sr-only">Panel de mensajes</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    />
                  </svg>
                </button>
                <!-- Notifications button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                  class="p-2 transition-colors rounded-lg shadow-md hover:bg-indigo-800 hover:text-white focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-indigo-600' : 'text-gray-500 bg-white'"
                >
                  <span class="sr-only">Panel de notificaciones</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                  </svg>
                </button>
              </div>
  
              <!-- User avatar -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-10 h-10 rounded-lg shadow-md"
                    src="http://ronaldmottram.co.nz/wp-content/uploads/2019/01/default-user-icon-8.jpg"
                    alt="User"
                  />
                  <span class="sr-only">Menú de usuarios</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                    <a href="
                    @auth
                    {{ route('my-profile') }}
                    @else
                    {{ route('dashboard') }}
                    @endauth
                    " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>

                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <a href="#" onclick="this.closest('form').submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cerrar Sesión</a>                      
                    </form>
                    @endauth
              
                </div>
              </div>
            </nav>
  
            <div
              x-transition:enter="transform transition-transform duration-300"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition-transform duration-300"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-show="isSidebarOpen"
              class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-indigo-100 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64"
            >
              <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center flex-shrink-0 py-10">
                  <a href="#">
                    <!-- <svg
                      class="text-indigo-600"
                      width="96"
                      height="53"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.691 34.703L13.95 28.2 32.09 52h8.087L18.449 23.418 38.594.813h-8.157L7.692 26.125V.812H.941V52h6.75V34.703zm27.61-7.793h17.156v-5.308H35.301v5.308zM89.19 13v22.512c0 3.703-1.02 6.574-3.058 8.613-2.016 2.04-4.934 3.059-8.754 3.059-3.773 0-6.68-1.02-8.719-3.059-2.039-2.063-3.058-4.945-3.058-8.648V.813h-6.68v34.874c.047 5.297 1.734 9.458 5.062 12.481 3.328 3.023 7.793 4.535 13.395 4.535l1.793-.07c5.156-.375 9.234-2.098 12.234-5.168 3.024-3.07 4.547-7.02 4.57-11.848V13h-6.785zM89 8h7V1h-7v7z"
                      />
                    </svg> -->
                    {{-- <img
                      class="w-24 h-auto rounded-lg"
                      src="https://imagizer.imageshack.com/img922/3696/0TYcXs.png"
                      alt="Trappazo"
                    /> --}}
                    <h4 class="text-2xl antialiased font-semibold">Trappazo</h4>
                  </a>
                </div>
  
                <!-- Links -->
                <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
                  <a href="
                  @guest
                  {{ route('dashboard') }}
                  @else
                  {{ route('my-profile') }}
                  @endguest
                  " class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
                    <span aria-hidden="true" class="p-2 bg-indigo-700 rounded-lg">
                      <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        />
                      </svg>
                    </span>
                    <span>Inicio</span>
                  </a>
                  {{-- <a
                    href="#"
                    class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white"
                  >
                    <span
                      aria-hidden="true"
                      class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white"
                    >
                      <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                        />
                      </svg>
                    </span>
                    <span>Pages</span>
                  </a> --}}
                </div>
  
                <div class="flex-shrink-0 p-4 mt-10">
                  <div class="hidden p-2 space-y-6 bg-gray-100 rounded-lg md:block">
                    <img
                      aria-hidden="true"
                      class="-mt-10"
                      src="https://raw.githubusercontent.com/kamona-ui/dashboard-alpine/52b4b4abb92ef251f6610be416038b48209d7a81/public/assets/images/undraw_web_developer_p3e5.svg"
                    />
                    <p class="text-sm text-center text-indigo-600">
                      Únete a nuestro programa <span class="text-base text-indigo-700er">Premium</span> hoy! <br />
                    </p>
                    <button
                      class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100"
                    >
                      Mejora a premium
                    </button>
                  </div>
  
                  <button
                    class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg md:hidden hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100"
                  >
                    Mejora a premium
                  </button>
                </div>
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-4 py-6">
                <h2 class="text-xl">Mensajes</h2>
              </section>
  
              <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                <h2 class="text-xl">Notificaciones</h2>
              </section>
            </div>
          </div>
          <div class="flex flex-col flex-1">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">
              <form action="#" class="flex-1">
                <!--  -->
              </form>
              <div class="items-center hidden ml-4 sm:flex">
                <button
                  @click="isSettingsPanelOpen = true"
                  class="p-2 mr-4 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Configuración</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </button>
                </div>
  
              <!-- Mobile sub header button -->
              <button
                @click="isSubHeaderOpen = !isSubHeaderOpen"
                class="p-2 text-gray-400 bg-white rounded-lg shadow-md sm:hidden hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
              >
                <span class="sr-only">Más</span>
  
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                  />
                </svg>
              </button>
  
              <!-- Mobile sub header -->
              <div
                x-transition:enter="transform transition-transform"
                x-transition:enter-start="translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transform transition-transform"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-full opacity-0"
                x-show="isSubHeaderOpen"
                @click.away="isSubHeaderOpen = false"
                class="absolute flex items-center justify-between p-2 bg-white rounded-md shadow-lg sm:hidden top-16 left-5 right-5"
              >
                <!-- Seetings button -->
                <button
                  @click="isSettingsPanelOpen = true; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Configuración</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </button>
                <!-- Messages button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'messagesTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Panel de mensajes</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    />
                  </svg>
                </button>
                <!-- Notifications button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Panel de Notificaciones</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                  </svg>
                </button>
              </div>
            </header>
  
            <div class="flex flex-1">
              <!-- Main -->

              @yield('content')

            </div>
          </div>
        </div>
  
        <!-- Panels -->
  
        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div
          x-show="isSettingsPanelOpen"
          class="fixed inset-0 bg-black bg-opacity-50"
          @click="isSettingsPanelOpen = false"
          aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          x-show="isSettingsPanelOpen"
          class="fixed inset-y-0 right-0 w-64 bg-white border-l border-indigo-100 rounded-l-3xl"
        >
          <div class="px-4 py-8">
            <h2 class="text-lg font-semibold">Configuración</h2>

            <div class="mt-6">
              @auth
                <a href="{{ route('edit') }}" class="flex items-center w-full space-x-2 text-white bg-indigo-600 rounded-lg">
                  <span aria-hidden="true" class="p-2 rounded-lg">
                    <svg
                      class="w-6 h-6"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                      <line x1="9" y1="9" x2="10" y2="9" />
                      <line x1="9" y1="13" x2="15" y2="13" />
                      <line x1="9" y1="17" x2="15" y2="17" />
                    </svg>
                  </span>
                  <span>Editar mis datos</span>
                </a>
              @endauth
            </div>

          </div>
        </section>
  
  
  
      <!-- Author links -->
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            return {
                isSidebarOpen: false,
                currentSidebarTab: null,
                isSettingsPanelOpen: false,
                isSubHeaderOpen: false,
                watchScreen() {
                    if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                    }
                },
            }
        }
    </script>

</body>
</html>