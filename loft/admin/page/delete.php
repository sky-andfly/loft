<?php
$db->deleteById('product', $_GET['id']);
$_SESSION['add'] = "Товар удален";
header("Location: all-product");