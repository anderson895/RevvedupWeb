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

<!-- Category Modal -->
<div id="categoryModal" 
     class="fixed inset-0 bg-gray-900/70 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-8">
    <h2 class="text-2xl font-bold text-red-900 mb-6">Categories</h2>
    <div id="category-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-8"></div>
    <div class="mt-6 text-right">
      <button id="close-category" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800">Close</button>
    </div>
  </div>
</div>



<!-- Book Repair Modal -->
<div id="repairModal" 
     class="fixed inset-0 bg-gray-900/70 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-8">
    <h2 class="text-2xl font-bold text-red-900 mb-6">Book a Repair</h2>

    <form id="repairForm" class="space-y-4">
        
      <!-- Service selection (static) -->
      <div>
        <label class="block font-medium">Select Service</label>
        <select id="service" name="service" class="w-full border rounded px-3 py-2">
          <option value="Engine Repair">Engine Repair</option>
          <option value="Brake Service">Brake Service</option>
          <option value="Oil Change">Oil Change</option>
          <option value="Tire Replacement">Tire Replacement</option>
          <option value="other">Other</option>
        </select>
      </div>

      <!-- Custom Service (hidden by default) -->
      <div id="otherServiceWrapper" class="hidden">
        <label class="block font-medium">Specify Other Service</label>
        <input type="text" id="otherService" name="otherService" class="w-full border rounded px-3 py-2">
      </div>

      <!-- Employee selection (API fetched) -->
      <div>
        <label class="block font-medium">Select Employee</label>
        <select id="employee" name="employee_id" class="w-full border rounded px-3 py-2">
          <option>Loading employees...</option>
        </select>
      </div>

      <!-- Personal Info -->
      <div>
        <label class="block font-medium">Full Name</label>
        <input type="text" id="fullname" name="fullname" class="w-full border rounded px-3 py-2" required>
      </div>
      <div>
        <label class="block font-medium">Contact Number</label>
        <input type="text" id="contact" name="contact" class="w-full border rounded px-3 py-2" required>
      </div>

      <!-- Appointment Date -->
      <div>
        <label class="block font-medium">Appointment Date</label>
        <input type="date" id="appointmentDate" name="appointmentDate" class="w-full border rounded px-3 py-2" required>
      </div>

      <!-- Appointment Time -->
      <div>
        <label class="block font-medium">Appointment Time</label>
        <input type="time" id="appointmentTime" name="appointmentTime" class="w-full border rounded px-3 py-2" required>
      </div>

      <!-- Emergency Repair -->
      <div class="flex items-center">
        <input type="checkbox" id="emergency" name="emergency" value="1" class="mr-2">
        <label for="emergency">Emergency Repair</label>
      </div>

      <!-- Pending -->
      <p class="text-sm text-gray-600">⚠️ Appointment will be pending for approval.</p>

      <!-- Buttons -->
      <div class="mt-6 flex justify-end space-x-2">
        <button type="button" id="close-repair" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800">Submit</button>
      </div>
    </form>
  </div>
</div>


</body>
<?php 
include "../src/components/home/footer.php";
?>


<script src="../static/js/home/fetch_product_api.js"></script>
<script src="../static/js/home/fetch_product_employee.js"></script>
