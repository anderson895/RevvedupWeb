<?php 
include "src/components/header.php";
?>
<body class="relative font-sans text-white">

  <!-- Navbar -->
  <header class="absolute top-0 left-0 w-full flex justify-end items-center p-6 z-20 bg-black/50">
    <nav class="flex gap-6 text-sm font-semibold">
      <a href="login" class="hover:text-red-500">Sign In</a>
      <a href="register" class="hover:text-red-500">Register</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="relative w-full h-screen" style="background-image: url('static/images/cover.jpg'); background-size: cover; background-position: center;">


    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
     <!-- Logo -->
    <img src="static/images/logo.png" alt="RevvedUp Logo" class="w-72 md:w-96 h-auto mb-8 mt-4 mx-auto">


            
            <!-- Headline -->
            <h1 class="text-3xl md:text-5xl font-bold mb-4">
                Your one-stop destination for all things motorcycle.
            </h1>
            <h2 class="text-xl md:text-2xl font-semibold mb-2">
                BROWSE PARTS, or book repairs — all in one place
            </h2>
            <p class="text-sm md:text-base mb-3">
                Fast. Reliable. Built for riders, by riders. Let’s get your bike back on the road.
            </p>


      <!-- Buttons -->
      <div class="flex gap-6">
        <a href="guest/" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition">PRODUCTS</a>
        <a href="login" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition">BOOK A REPAIR</a>
      </div>
    </div>
  </section>

</body>

<?php 
include "src/components/footer.php";
?>