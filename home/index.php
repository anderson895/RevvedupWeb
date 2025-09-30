<?php 
include "../src/components/home/header.php";
?>
<body class="bg-white font-sans">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-red-900 to-red-700 p-4 flex justify-between items-center">
    <div class="text-white font-bold text-xl">
      RevvedUp
    </div>

    <div class="space-x-6 hidden md:flex">
      <a href="#" id="open-category" class="text-white hover:text-red-300">Categories</a>
      <a href="#" id="open-repair" class="text-white hover:text-red-300">Book a Repair</a>
      <a href="summary" class="text-white hover:text-red-300">Booking Summary</a>
    </div>

    <!-- Search -->
    <div class="relative">
      <input type="text" placeholder="Search Item"
        class="rounded-full px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-red-500">
      <button class="absolute right-2 top-2 text-red-700">
        <span class="material-icons">search</span>
      </button>
    </div>
  </nav>

  <!-- Sort dropdown -->
 <div class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-start space-x-2">
  <label for="sort" class="font-medium">Sort by:</label>
  <select id="sort" class="border rounded px-3 py-2">
    <option value="default">Top Viewed</option>
    <option value="low-high">Price: Low to High</option>
    <option value="high-low">Price: High to Low</option>
  </select>
</div>

  <!-- Product Grid -->
  <div id="product-grid" class="max-w-6xl mx-auto px-4 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <!-- Products will load here dynamically -->
  </div>


  <?php include "modal.php"; ?>

</body>
<?php 
include "../src/components/home/footer.php";
?>



<script src="../static/js/home/product_api.js"></script>
<script src="../static/js/home/employee_api.js"></script>
