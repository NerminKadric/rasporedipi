<?php
    class ConsolePrint {
        public function print($msg) {
            echo '<script>console.log('+ $msg +'); </script>';
        }
    }