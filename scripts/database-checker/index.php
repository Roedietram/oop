<?php
require_once "Connect.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = $_POST["host"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    $dbname = $_POST["dbname"];
    $port = $_POST["port"];

    $connect = new Connect($host, $user, $password, $dbname, (int)$port);
    $message = $connect->connect();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Database Test Connectie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Test databaseconnectie</h2>

        <?php if (!empty($message)): ?>
            <div class="alert <?php echo ($message === "Verbinding succesvol!") ? "alert-success" : "alert-danger"; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Database naam</label>
                <input type="text" class="form-control" name="dbname" value="">
            </div>

            <div class="mb-3">
                <label class="form-label">Gebruiker</label>
                <input type="text" class="form-control" name="user" value="root">
            </div>

            <div class="mb-3">
                <label class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" name="password" value="">
            </div>

            <div class="mb-3">
                <label class="form-label">Host</label>
                <input type="text" class="form-control" name="host" value="localhost">
            </div>

            <div class="mb-3">
                <label class="form-label">Poort</label>
                <input type="number" class="form-control" name="port" value="3306">
            </div>

            <button type="submit" class="btn btn-primary">Test verbinding</button>
        </form>
    </div>
</div>

</body>
</html>
