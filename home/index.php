<?php 
include "../src/components/home/header.php";
?>
<body class="bg-white font-sans">

<?php 
include "../src/components/home/nav.php";
?>


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
