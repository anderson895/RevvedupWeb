<?php 
include "../src/components/home/header.php";
?>
<body class="bg-white font-sans">

<?php 
include "../src/components/home/nav.php";
?>

<!-- Main Container -->
<div class="max-w-6xl mx-auto px-4 py-6 space-y-6">

  <!-- Sort & Search Section -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
    
    <!-- Sort Dropdown -->
    <div class="flex items-center space-x-2">
      <label for="sort" class="font-medium">Sort by:</label>
      <select id="sort" class="border rounded px-3 py-2">
        <option value="default">Top Viewed</option>
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
      </select>
    </div>

    <!-- Search -->
    <div class="relative w-full md:w-64">
      <input type="text" placeholder="Search Item" id="searchInput"
        class="rounded-full px-4 py-2 w-full bg-white border ">
      <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-red-700">
        <span class="material-icons">search</span>
      </button>
    </div>

  </div>

  <!-- Product Grid -->
  <div id="product-grid" class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <!-- Products will load here dynamically -->
  </div>

</div>

<?php include "modal.php"; ?>
<?php 
include "../src/components/home/footer.php";
?>

<script src="../static/js/home/product_api.js"></script>
<script src="../static/js/home/employee_api.js"></script>
