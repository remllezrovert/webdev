<?php
function create_copyright_notice() {
    $year = date('Y');
    return '&copy; ' . $year . ' All Rights Reserved.';
}
?>
<footer><?php echo create_copyright_notice(); ?></footer>
</body>
</html>