<?php

 session_start();

 session_destroy();

 header("location: signin.php"); 

?>
<script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>