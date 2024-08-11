private function sendWhatsAppMessage($to, $message)
{
// $sid = env('TWILIO_SID');
// $token = env('TWILIO_AUTH_TOKEN');

$sid = "AC0efd19c3d86a1e5bba4e7a3b8d26a91f";
$token = "42c37519116efcf2c0f5091ef90bd3e1";

if (empty($sid) || empty($token)) {
throw new \Exception('Twilio SID atau Auth Token tidak tersedia.');
}

$twilio = new Client($sid, $token);

$twilio->messages->create(
'whatsapp:' . $to, // Nomor tujuan
// 'whatsapp:+6281324768641'
[
// env('TWILIO_WHATSAPP_FROM');

'from' => "whatsapp:+14155238886", // Nomor pengirim
'body' => $message // Pesan yang dikirim
]
);
}


<!-- StudentController.store -->
$this->sendWhatsAppMessage(
$request->telepon,
"Selamat, data Anda telah berhasil dikirim ke sistem kami. Terima kasih!"
);

<!-- Token Twilio -->
TWILIO_SID=AC0efd19c3d86a1e5bba4e7a3b8d26a91f
TWILIO_AUTH_TOKEN=42c37519116efcf2c0f5091ef90bd3e1
TWILIO_WHATSAPP_FROM=whatsapp:+14155238886