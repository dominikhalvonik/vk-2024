<?php
$servername = "db"; // Názov služby v docker-compose.yaml, používame "db" pre MySQL službu
$username = "pouzivatel";
$password = "heslo";
$dbname = "databaza";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3306", $username, $password);
    // Nastavenie PDO chybového režimu na výnimku
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vytvorenie tabuľky
    $sql = "CREATE TABLE IF NOT EXISTS testovacia_tabulka (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    meno VARCHAR(30) NOT NULL
    )";

    // Použitie exec(), pretože žiadny výsledok nie je vrátený
    $conn->exec($sql);
    echo "Tabuľka testovaciaTabulka úspešne vytvorená<br>";

    // Vloženie dát
    $sql = "INSERT INTO testovacia_tabulka (meno) VALUES ('Jan')";
    // Použitie exec() opäť, pretože žiadne dáta nie sú vrátené
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "Nový záznam úspešne vytvorený. ID: $last_id<br>";

    // Výber a výpis dát
    $sql = "SELECT id, meno FROM testovacia_tabulka";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Nastavenie výsledku na asociované pole
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
        echo "ID: " . $v["id"]. " - Meno: " . $v["meno"]. "<br>";
    }
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}

$conn = null;
?>