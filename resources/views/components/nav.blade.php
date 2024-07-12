<!-- Desktop Header -->
<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    <div x-cloak x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <span  @click="isOpen = ! isOpen" class="cursor-pointer text-black m-3">{{auth()->user()->user}}<i class="fas fa-bars ml-2"></i></span>
        <div x-show="isOpen" @click.away="isOpen = false" class="absolute rounded-lg shadow-lg py-2 mt-16 bg-white">
            <a href="#" class="block px-4 py-2 account-link hover:bg-gray-200"><i class="fa-solid fa-user mr-2"></i>Profile</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <a href="#" onclick="this.closest('form').submit()" class="block px-4 py-2 account-link hover:bg-gray-200"><i class="fa-solid fa-right-from-bracket mr-2"></i>Log out</a>
            </form>
        </div>
    </div>
</header>
<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="#" class="bg-white text-black font-bold text-xl p-4">Logo</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Panel
        </a>
        <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Gestion
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-user mr-3"></i>
            Perfil
        </a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <a href="#" onclick="this.closest('form').submit()" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
              <i class="fas fa-sign-out-alt mr-3"></i>
              Cerrar seccion
            </a>
        </form>
    </nav>
</header>
