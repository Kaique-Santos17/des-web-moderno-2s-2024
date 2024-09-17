<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Opcional: Destroi a sessão completamente

header('location: index.php');
?>