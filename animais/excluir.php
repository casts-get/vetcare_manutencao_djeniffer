
<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../config/auth.php';

exigirLogin();

$id = (int)($_GET['id'] ?? 0);

try {
    if ($id > 0) {
        $s = $pdo->prepare("SELECT COUNT(*) FROM consultas WHERE animal_id = ?");
        $s->execute([$id]);

        $consultas = (int)$s->fetchColumn();

        if ($consultas === 0) {
            $s = $pdo->prepare("DELETE FROM animais WHERE id = ?");
            $s->execute([$id]);
        }
    }
} catch (PDOException $e) {
}

header('Location: index.php');
exit;
