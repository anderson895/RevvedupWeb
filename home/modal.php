<!-- Category Modal -->
<div id="categoryModal" 
     class="fixed inset-0 bg-gray-900/70 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-8 max-h-[90vh] flex flex-col">
    <h2 class="text-2xl font-bold text-red-900 mb-6">Categories</h2>

    <!-- Scrollable category grid -->
    <div id="category-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-8 overflow-y-auto pr-2 flex-1">
      <!-- Dynamic categories will render here -->
    </div>

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




      <!-- City Selection -->
      <div>
        <label class="block font-medium">Select City</label>
        <select id="city" name="city" class="w-full border rounded px-3 py-2" required>
          <option value="">-- Select City --</option>
          <option value="Antipolo">Antipolo</option>
          <option value="Angono">Angono</option>
          <option value="Taytay">Taytay</option>
          <option value="Cainta">Cainta</option>
        </select>
      </div>

      <!-- Street Input -->
      <div>
        <label class="block font-medium">Street</label>
        <input type="text" id="street" name="street" class="w-full border rounded px-3 py-2" placeholder="Enter your street address" required>
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
        <button type="button" id="close-repair" class="cursor-pointer bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="cursor-pointer bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800">Submit</button>
      </div>
    </form>
  </div>
</div>











<!-- Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
    <button id="closeModal" class="absolute cursor-pointer top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
    <h2 class="text-xl font-bold mb-4">Appointment Details</h2>
    <div id="modalContent" class="space-y-2 text-gray-700">
      <!-- Dynamic content goes here -->
    </div>
  </div>
</div>