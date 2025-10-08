<!-- Navbar -->
<nav class="bg-gradient-to-r from-red-900 to-red-700 p-4 flex flex-col md:flex-row md:justify-between md:items-center">
    <div class="flex justify-between items-center w-full md:w-auto">
        <!-- Logo -->
        <div class="text-white font-bold text-2xl">
            <a href="index" class="hover:text-red-300">RevvedUp</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobileMenuBtn" class="text-white focus:outline-none">
                <span class="material-icons">menu</span>
            </button>
        </div>
    </div>

    <!-- Links -->
    <div class="mt-4 md:mt-0 md:flex md:items-center md:space-x-6 hidden md:block" id="navLinks">
        <a href="#" id="open-category" class="text-white hover:text-red-300">Categories</a>
        <a href="#" id="open-repair" class="text-white hover:text-red-300">Book a Repair</a>
        <a href="summary" class="text-white hover:text-red-300">Booking Summary</a>
    </div>

    <!-- Search + Profile -->
    <div class="flex items-center mt-4 md:mt-0 md:ml-4 space-x-4">
      

        <!-- Profile Dropdown -->
        <div class="relative">
            <button id="profileBtn" class="flex cursor-pointer items-center text-white focus:outline-none hover:text-red-300">
                <img src="../static/images/user.png" alt="Profile" class="rounded-full w-8 h-8 mr-2">
                <span class="font-medium"><?=$On_Session[0]['customer_fullname']?></span>
                <span class="material-icons ml-1">arrow_drop_down</span>
            </button>

            <!-- Dropdown Menu -->
            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50">
                <!-- <a href="profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a> -->
                <a href="logout" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Toggle profile dropdown
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', function(e) {
        if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
        }
    });

    // Toggle mobile menu
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    mobileMenuBtn.addEventListener('click', () => {
        navLinks.classList.toggle('hidden');
    });
</script>
