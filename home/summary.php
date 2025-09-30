<?php 
include "../src/components/home/header.php";
?>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-red-900 to-red-700 p-4 flex flex-col md:flex-row md:justify-between md:items-center">
    <div class="flex justify-between items-center">
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

    <!-- Search -->
    <div class="relative mt-4 md:mt-0 md:ml-4">
      <input type="text" placeholder="Search Item" id="searchInput"
        class="rounded-full px-4 py-2 w-full md:w-64 bg-white focus:outline-none focus:ring-2 focus:ring-red-500">
      <button class="absolute right-2 top-2 text-red-700">
        <span class="material-icons">search</span>
      </button>
    </div>
  </nav>
<!-- Content -->
<main class="flex-1 p-6 bg-gray-50">
  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
              Reference Number
            </th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
              Date
            </th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
              Status
            </th>
            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        <tbody id="appointmentTableBody" class="bg-white divide-y divide-gray-200">
          <!-- DYNAMIC CONTENT -->
        </tbody>
      </table>
    </div>
  </div>
</main>


  <?php include "modal.php"; ?>
</body>

<?php 
include "../src/components/home/footer.php";
?>

<script src="../static/js/home/product_api.js"></script>
<script src="../static/js/home/employee_api.js"></script>
<script src="../static/js/home/summary.js"></script>

