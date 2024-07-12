<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
  <div class="container mx-auto cursor-pointer">
    <p class="text-3xl text-gray-200 text-center">Simple</p>
    <p class="text-3xl text-gray-200 text-center">Siderbar</p>
  </div>
  <nav class="font-semibold pt-3">
    @can ('dashboard')
      <a href="{{route('panel')}}" class="flex text-white items-center opacity-75 hover:opacity-100 py-2 pl-6 nav-item m-2 rounded-lg {{ request()->is('dashboard') ? 'active-nav-link' : '' }}">
        <i class="fas fa-chart-line mr-3"></i>
        Dashboard
      </a>
    @endcan
    @can ('tables')
      <div x-cloak x-data="{Open: false}" class="cursor-pointer w-full">
        <a @click="Open = !Open" class="flex text-white items-center opacity-75 hover:opacity-100 py-2 pl-6 nav-item m-2 rounded-lg {{ request()->is('users*') ? 'active-nav-link' : '' }}">
          <i class="fa-solid fa-table mr-3"></i>
          Tables
        </a>
          <div x-show="Open" @click.away="Open = false" class="cursor-pointer w-full">
            @can ('users')
              <a href="{{route('users.index')}}" class="flex text-white items-center opacity-75 hover:opacity-100 py-2 pl-6 nav-item m-2 rounded-lg {{ request()->is('users*') ? 'active-nav-link' : '' }}">
                <i class="fa-solid fa-users mr-3"></i>
                Users
              </a>
            @endcan
          </div>
      </div>
    @endcan
  </nav>
</aside>
