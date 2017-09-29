<?php 
    class Dongvat{
        var $an = "dong vat an" ;
        function an(){
            echo $this->an;
        }
    }
    $conheo = new Dongvat();
    $conheo->an();
?>