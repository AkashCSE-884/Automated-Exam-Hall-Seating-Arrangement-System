 <?php include '../navber.php'; ?>
 <link rel="" type="" href=" https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css">
 <link rel="" type="" href=" https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css">
 <script src="https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <style>

 </style>
 <div class="h-96 mt-20 bg-cover" style="background-image: url('https://s3.ap-south-1.amazonaws.com/cdn-marketplacexyz/sheba_xyz/images/webp/home-banner.webp');">
     <div class="container   flex items-center justify-center ">
         <div class="mt-32 opacity-100 pop">
             <div class="mb-3">
                 <p class="text-5xl font-bold text-pink-800 text-center">Your Personal Assistant</p>
                 <p class="text-xl font-bold text-pink-800">One-stop solution for your services. Order any service, anytime.</p>
             </div>

             <div class="flex flex-col md:flex-row">
                 <select class="px-10 py-3 mr-5 my-3 md:my-0 rounded-md  focus:shadow focus:outline-none" name="" id="">
                     <option value="" class="text-xl font-bold ">ABC</option>
                 </select>
                 <div class="relative">
                     <div class="absolute top-4 left-3"> <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i> </div> <input type="text" class="h-14 w-96 pl-10 pr-30 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search anything...">
                     <div class="absolute top-2 right-2"> <button class="h-10 w-20 text-white rounded-lg bg-pink-500 hover:bg-pink-600">Search</button> </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <section class="m-8">
     <p class="text-4xl font-bold mb-3">Our Services</p>
     <div id="slider" class="flex flex-row gap-3">
         <div>
             <img class="rounded-md h-48 w-full shadow-md mb-2" src="https://s3.ap-south-1.amazonaws.com/cdn-shebaxyz/images/categories_images/thumbs/1617856509_pestcontrolservice_270x180.webp" alt="">
             <p class="text-xl font-bold text-center">Home Cleaning</p>
         </div>
         <div>
             <img class="rounded-md h-48 w-full shadow-md mb-2" src="https://s3.ap-south-1.amazonaws.com/cdn-shebaxyz/images/categories_images/thumbs/1617856509_pestcontrolservice_270x180.webp" alt="">
             <p class="text-xl font-bold text-center">Home Cleaning</p>
         </div>
         <div>
             <img class="rounded-md h-48 w-full shadow-md mb-2" src="https://s3.ap-south-1.amazonaws.com/cdn-shebaxyz/images/categories_images/thumbs/1617856509_pestcontrolservice_270x180.webp" alt="">
             <p class="text-xl font-bold text-center">Home Cleaning</p>
         </div>
         <div>
             <img class="rounded-md h-48 w-full shadow-md mb-2" src="https://s3.ap-south-1.amazonaws.com/cdn-shebaxyz/images/categories_images/thumbs/1617856509_pestcontrolservice_270x180.webp" alt="">
             <p class="text-xl font-bold text-center">Home Cleaning</p>
         </div>
         <div>
             <img class="rounded-md h-48 w-full shadow-md mb-2" src="https://s3.ap-south-1.amazonaws.com/cdn-shebaxyz/images/categories_images/thumbs/1617856509_pestcontrolservice_270x180.webp" alt="">
             <p class="text-xl font-bold text-center">Home Cleaning</p>
         </div>
     </div>
     <a class="text-base font-bold mb-3 float-right text-underline" href="#">All services</a>
 </section>
 <section class="mx-8 my-12">
     <div class="flex flex-row gap-2">
         <div class="border-t-2 border-gray-600 w-44 h-1 mt-3"></div>
         <p class="text-base  text-gray-700">Why Choose us</p>
     </div>
     <p class="text-xl font-bold text-gray-600 mb-4">Because we care about your safety..</p>
     <div class="grid grid-cols-2 px-2 gap-x-4">
         <div class="grid grid-cols-2 gap-3">
             <div class="rounded-md">
                 <img  class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_mask.png" alt="">
                 <p class="text-xl font-bold text-center">Ensuring Masks</p>
             </div>
             <div class="rounded-md ">
                 <img  class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_24_7.png" alt="">
                 <p class="text-xl font-bold text-center">24/7 Support</p>
             </div>
             <div class="rounded-md ">
                 <img  class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_sanitized.png" alt="">
                 <p class="text-xl font-bold text-center">Sanitising </br> Hands & Equipment</p>
             </div>
             <div class="rounded-md ">
                 <img  class="mx-auto w-20 h-20" src="https://cdn-marketplacexyz.s3.ap-south-1.amazonaws.com/sheba_xyz/images/png/usp_gloves.png" alt="">
                 <p class="text-xl font-bold text-center">Ensuring Gloves</p>
             </div>
         </div>
         <div class="">
                <img src="https://s3.ap-south-1.amazonaws.com/cdn-marketplacexyz/sheba_xyz/images/webp/why-choose-us.webp" alt="">
         </div>
     </div>
 </section>
 <?php include '../footer.php'; ?>