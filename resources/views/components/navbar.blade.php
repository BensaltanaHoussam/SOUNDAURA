<nav class="bg-blue-500 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold">MyWebsite</a>
        
        <div class="hidden md:flex space-x-4">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/about" class="hover:text-gray-300">About</a>
            <a href="/contact" class="hover:text-gray-300">Contact</a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
            ☰
        </button>
    </div>
</nav>
