<?php
if (isset($_SESSION['errorPlano'])) {
    echo '<div class="alert alert-danger" style="margin: 10px 10px 10px 0px;">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['errorPlano']);
} else {
    echo '<div class="alert alert-danger" style="margin: 10px 10px 10px 0px; visibility: hidden ">ERRO</div>';
}
