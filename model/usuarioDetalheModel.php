<?php
include_once('conn.php');

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;

$mail->Username = 'atomtechsl@gmail.com';
$mail->Password = 'zsowbvimzijjdxdq';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

function reservaPresente($nome,$email){

    global $pdo, $mail;

    $sqlUsuario = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sqlUsuario);
    $stmt->execute(['email' => $email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($resultado)) {

        $sqlPostUsuario = "INSERT INTO usuarios (

            nomeUsuario,
            email,
            nivelAcesso

            ) VALUES (

            :nomeUsuario,
            :email,
            :nivelAcesso
        )";

            $stmt = $pdo->prepare($sqlPostUsuario);

            $stmt->execute([

                ':nomeUsuario' => $nome,
                ':email' => $email,
                ':nivelAcesso' => 2

            ]);

            
        }

        $idPresente = $_SESSION['idPresente'];

        $sql = "SELECT * FROM presentes WHERE idPresente = :idPresente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['idPresente' => $idPresente]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            echo "<script>alert('Algum erro ocorreu!');</script>";
            header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");
            exit;
        }

        $dsPresente = $resultado['dsPresente'];
        $valorPresente = $resultado['valorPresente'];
        $imgPresente = $resultado['imgPresente'];

        $mail->clearAddresses();
        $mail->clearAttachments();


        $mail->setFrom('atomtechsl@gmail.com', 'Projeto Enxoval');
        $mail->addAddress($email, $nome);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Confirmação de presente';

        $imgPresente = str_replace(' ', '_', strtolower(trim($imgPresente)));

        $urlImagem = "https://blue-woodpecker-158635.hostingersite.com/projetoEnxoval/images/" . urlencode($imgPresente);

        $mail->Body = "
        <h2>Olá, {$nome}!</h2>
        <h3>Agradecemos pelo seu carinho e contribuição!</h3>
        <h3>
        <a href='https://blue-woodpecker-158635.hostingersite.com/projetoEnxoval/view/confirmaPresente.php?email={$email}&idPresente={$idPresente}'>
        Clique aqui para confirmar seu presente
        </a>
        </h3>

        <h3><strong>{$dsPresente}</strong></h3>

        <img src=\"$urlImagem\" width=\"200\">

        <h3>Valor: R$ <strong>" . number_format($valorPresente, 2, ',', '.') . "</strong></h3>

        ";

        try {

            $mail->send();

            header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");

        } catch (Exception $e) {

            echo $mail->ErrorInfo;

            echo "<script>alert('Erro ao enviar e-mail!');</script>";
            header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");

        }
    }
?>