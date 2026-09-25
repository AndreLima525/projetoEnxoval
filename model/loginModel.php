<?php
    
    include_once('conn.php');
    
    function buscarLogin($usuarioLogin) {
        global $pdo;

        $sql = "SELECT * FROM usuarioadm WHERE userLogin = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":usuario", $usuarioLogin);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function buscarEvento($idUsuario) {
        global $pdo;

        $sql = "SELECT * FROM infoevento WHERE idUsuarioAdm  = :usuario AND stAtivo = 'S'";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":usuario", $idUsuario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>