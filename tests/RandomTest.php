<?php

$conn = pg_connect("host=localhost port=5432 dbname=cadastro user=user password=pass");

if (!$conn) {
    die("Erro ao conectar");
}

$query = 'SELECT codigo, nome FROM pessoa';

$result = pg_query($conn, $query);

if (!$result) {
    die("Erro na query: " . pg_last_error($conn));
}

while ($row = pg_fetch_assoc($result)) {
    echo $row['codigo'] . ' - ' . $row['nome'] . "\n";
}

pg_close($conn);

