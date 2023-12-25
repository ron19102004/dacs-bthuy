<?php
session_start();
session_destroy();
?>
<script>
    const cls_s = () => {
        localStorage.clear();
        window.location.href = '../index.php';
    }
    cls_s();
</script>