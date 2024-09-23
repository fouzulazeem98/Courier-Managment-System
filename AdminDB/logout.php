<?php
session_destroy();
echo "
        <script>
            location.assign('../login.php')
        </script>
     ";
