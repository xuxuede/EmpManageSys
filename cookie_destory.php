<?php

     foreach($_COOKIE as $key=>$val){

         setCookie($key,"",time()-10);
     }
?>