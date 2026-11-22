
<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$titulo = $titulo ?? 'VetCare';
$base = '/vetcare_manutencao_djeniffer';
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($titulo) ?> | VetCare</title>
<link rel="stylesheet" href="<?= $base ?>/assets/style.css">
</head>
<body>
<header class="topbar">
  <a class="brand" href="<?= $base ?>/index.php">🐾 VetCare</a>
  <nav>
    <?php if (!empty($_SESSION['usuario_id'])): ?>
      <a href="<?= $base ?>/index.php">Painel</a>
      <a href="<?= $base ?>/tutores/index.php">Tutores</a>
      <a href="<?= $base ?>/animais/index.php">Animais</a>
      <a href="<?= $base ?>/consultas/index.php">Consultas</a>
      <a href="<?= $base ?>/chamados/index.php">Suporte</a>
      <a href="<?= $base ?>/logout.php">Sair</a>
    <?php endif; ?>
  </nav>
</header>
<main class="container">
