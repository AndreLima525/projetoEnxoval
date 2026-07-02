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

$mail->Username = 'andre525luis@gmail.com';
$mail->Password = 'ynbwrppvlxllpzdc';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

function reservaPresente($nome,$email){

    global $pdo, $mail;

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

    $mail->setFrom('andre525luis@gmail.com', 'Projeto Enxoval');
    $mail->addAddress($email, $nome);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Confirmação de presente';

   $imgPresente = str_replace(' ', '_', strtolower(trim($imgPresente)));
   
   $urlImagem = "https://blue-woodpecker-158635.hostingersite.com/projetoEnxoval/images/" . urlencode($imgPresente);

    $mail->Body = "
        <h2>Olá, {$nome}!</h2>
        <p>Agradecemos pelo seu carinho e contribuição!</p>
        <p>
            <a href='https://blue-woodpecker-158635.hostingersite.com/projetoEnxoval/view/confirmarPresente.php'>
                Clique aqui para confirmar seu presente
            </a>
        </p>
        
        <p><strong>{$dsPresente}</strong></p>
        
        <img src=\"$urlImagem\" width=\"200\">
        
        <p>Valor: R$ <strong>" . number_format($valorPresente, 2, ',', '.') . "</strong></p>
        
    ";

    try {
        $mail->send();
        header("Refresh:0; url=../view/detalhePresente.php?id=$idPresente");
    } catch (Exception $e) {
        echo "<script>alert('Erro ao enviar e-mail: {$mail->ErrorInfo}');</script>";
    }

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