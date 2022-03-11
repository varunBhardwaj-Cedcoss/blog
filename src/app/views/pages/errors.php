<?php
/* print_r($_SESSION['errors']); */
if (isset($_SESSION['errors'])) {
    if (count($_SESSION['errors'])==1) {
        foreach ($_SESSION['errors'] as $key => $error) {
            foreach ($error as $k => $v) {
                print_r($v);
                echo '<br>';
            }
        }
    } else {
        foreach ($_SESSION['errors'] as $key => $error) {
            print_r($error);
            echo '<br>';
        }
    }
}
