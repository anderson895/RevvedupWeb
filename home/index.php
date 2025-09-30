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
      <a href="#" class="text-white hover:text-red-300">Categories</a>
      <a href="#" class="text-white hover:text-red-300">Book a Repair</a>
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

  <script>
    let products = []; // store globally so we can sort later

    function renderProducts(list) {
      let grid = $("#product-grid");
      grid.empty();
      if (list.length === 0) {
        grid.html("<p class='col-span-4 text-center text-gray-500'>No products found.</p>");
        return;
      }

      list.forEach(product => {
        let card = `
          <div class="bg-white shadow-md rounded-lg p-4 text-center hover:shadow-xl transition">
            <img src="http://localhost/RevvedupPos/static/upload/${product.prod_img}" 
                 alt="${product.prod_name}" 
                 class="mx-auto mb-4 h-40 object-contain">
            <h3 class="text-gray-700 font-medium">${product.prod_name}</h3>
            <p class="text-red-700 font-bold text-lg">Php. ${product.prod_price}</p>
            <p class="text-sm text-gray-500">Stock: ${product.prod_qty}</p>
          </div>
        `;
        grid.append(card);
      });
    }

    $(document).ready(function () {
      // Fetch products
      $.ajax({
        url: "http://localhost/RevvedupPos/controller/end-points/controller.php?requestType=fetch_all_product",
        method: "GET",
        dataType: "json",
        success: function (response) {
          if (response.status === 200) {
            products = response.data;
            renderProducts(products);
          } else {
            $("#product-grid").html("<p class='col-span-4 text-center text-gray-500'>No products found.</p>");
          }
        },
        error: function () {
          $("#product-grid").html("<p class='col-span-4 text-center text-red-500'>Failed to load products.</p>");
        }
      });

      // Sorting function
      $("#sort").on("change", function () {
        let sortValue = $(this).val();
        let sortedProducts = [...products]; // clone array

        if (sortValue === "low-high") {
          sortedProducts.sort((a, b) => parseFloat(a.prod_price) - parseFloat(b.prod_price));
        } else if (sortValue === "high-low") {
          sortedProducts.sort((a, b) => parseFloat(b.prod_price) - parseFloat(a.prod_price));
        }
        // Default (Top Viewed) just resets to original
        renderProducts(sortedProducts);
      });
    });
  </script>

</body>
<?php 
include "../src/components/home/footer.php";
?>