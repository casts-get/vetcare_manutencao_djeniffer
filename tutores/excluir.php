
<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../config/auth.php';

exigirLogin();

$id = (int)($_GET['id'] ?? 0);

try {
    if ($id > 0) {
        $s = $pdo->prepare("SELECT COUNT(*) FROM animais WHERE tutor_id = ?");
        $s->execute([$id]);

        $animais = (int)$s->fetchColumn();

        if ($animais === 0) {
            $s = $pdo->prepare("DELETE FROM tutores WHERE id = ?");
            $s->execute([$id]);
        }
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
}

header('Location: index.php');
exit;
