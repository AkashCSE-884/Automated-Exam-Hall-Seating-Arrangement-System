   <!-- Required Jquery -->

   <script type="text/javascript" src="../../assets/js/jquery/jquery.min.js "></script>
   <script src="http://parsleyjs.org/dist/parsley.js"></script>
   <script type="text/javascript" src="../../assets/js/jquery-ui/jquery-ui.min.js "></script>
   <script type="text/javascript" src="../../assets/js/popper.js/popper.min.js"></script>
   <script type="text/javascript" src="../../assets/js/bootstrap/js/bootstrap.min.js "></script>
   <!-- waves js -->
   <script src="../../assets/pages/waves/js/waves.min.js"></script>
   <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>

   <!-- jquery slimscroll js -->
   <script type="text/javascript" src="../../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script type='text/javascript' src='https://s3.amazonaws.com/dynatable-docs-assets/js/jquery.dynatable.js'></script>

   <!-- slimscroll js -->
   <script src="../../assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
   <script src="../../assets/js/pcoded.min.js"></script>
   <script src="../../assets/js/vertical/vertical-layout.min.js "></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script type="text/javascript" src="../../assets/js/script.js "></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
   <script>
       var toastMixin = Swal.mixin({
           toast: true,
           icon: 'success',
           title: 'General Title',
           animation: false,
           position: 'top-right',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
       });
   </script>

   </body>

   </html>