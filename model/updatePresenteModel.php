<?php
require_once('../model/conn.php');

session_start();

$id = $_POST['id'];

$idEvento = $_SESSION['idEvento'];

$valor = $_POST['valor'];
$valor = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor);

$sqlBusca = "
    SELECT imgPresente
    FROM presentes
    WHERE idPresente = ? AND idEvento = ?
";

$stmtBusca = $pdo->prepare($sqlBusca);
$stmtBusca->execute([$id, $idEvento]);

$presenteAtual = $stmtBusca->fetch(PDO::FETCH_ASSOC);

$imgNome = $presenteAtual['imgPresente'] ?? null;


// Verifica se foi enviada uma nova imagem
if (
    isset($_FILES['imgPresente']) &&
    $_FILES['imgPresente']['error'] === UPLOAD_ERR_OK
) {

    $ext = strtolower(
        pathinfo($_FILES['imgPresente']['name'], PATHINFO_EXTENSION)
    );

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($ext, $extensoesPermitidas)) {
        die("Formato inválido!");
    }

    $imgNomeNova = uniqid() . "." . $ext;

    $caminho = "../images/" . $imgNomeNova;

    if (move_uploaded_file(
        $_FILES['imgPresente']['tmp_name'],
        $caminho
    )) {

        // Guarda o nome da nova imagem
        $imgNome = $imgNomeNova;

        // Opcional: exclui a imagem antiga
        if (
            !empty($presenteAtual['imgPresente']) &&
            file_exists("../images/" . $presenteAtual['imgPresente'])
        ) {
            unlink("../images/" . $presenteAtual['imgPresente']);
        }
    }
}


// UPDATE
$sql = "
    UPDATE presentes
    SET 
    dsPresente = ?,
    valorPresente = ?,
    linkPresente = ?,
    idComodo = ?,
    imgPresente = ?
    WHERE idPresente = ?
    AND idEvento = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['descricao'],
        $valor,
        $_POST['link'],
        $_POST['comodo'],
        $imgNome,
        $id,
        $idEvento
    ]);

    echo "

    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL= ../view/main.php'>
    <script type=\"text/javascript\">
    alert(\"Registro editado com sucesso!\");
    </script>                            
    ";
    exit;
?>