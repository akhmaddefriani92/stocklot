<?php

	function format_rupiah($harga){
        $rupiah=number_format($harga,0,',','.');
        return $rupiah;
    }

    function format_total($total){
        $rupiah=number_format($total,0,',','.');
        return $rupiah;
    }

?>