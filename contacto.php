<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: https://extein.com.mx');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Accept');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok'=>false,'message'=>'Method not allowed']);
    exit();
}

// Sanitize inputs
function clean($v) {
    return htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES, 'UTF-8');
}

$name    = clean($_POST['name'] ?? '');
$email   = clean($_POST['email'] ?? '');
$phone   = clean($_POST['phone'] ?? '');
$service = clean($_POST['service'] ?? '');
$message = clean($_POST['message'] ?? '');

// Validate
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'message'=>'Faltan campos requeridos.']);
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'message'=>'Correo electrónico inválido.']);
    exit();
}

// Anti-spam: honeypot
if (!empty($_POST['_gotcha'])) {
    http_response_code(200);
    echo json_encode(['ok'=>true,'message'=>'Gracias.']);
    exit();
}

$to      = 'ventas@extein.com.mx';
$subject = '=?UTF-8?B?' . base64_encode("Nuevo contacto desde extein.com.mx") . '?=';

$body  = "NUEVO MENSAJE DE CONTACTO — extein.com.mx\n";
$body .= str_repeat("─", 50) . "\n\n";
$body .= "Nombre:    $name\n";
$body .= "Email:     $email\n";
$body .= "Teléfono:  " . ($phone ?: 'No proporcionado') . "\n";
$body .= "Servicio:  " . ($service ?: 'No especificado') . "\n\n";
$body .= "Mensaje:\n$message\n\n";
$body .= str_repeat("─", 50) . "\n";
$body .= "Enviado desde: extein.com.mx\n";
$body .= "Fecha: " . date('d/m/Y H:i:s T') . "\n";

$headers  = "From: noreply@extein.com.mx\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    http_response_code(200);
    echo json_encode(['ok'=>true,'message'=>'Mensaje enviado correctamente.']);
} else {
    http_response_code(500);
    echo json_encode(['ok'=>false,'message'=>'Error al enviar. Intenta de nuevo o escríbenos a ventas@extein.com.mx']);
}
?>
