<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function sendMail(Request $request){
    
        $request->validate([
            'address' => 'required|email',
            'name' => 'required|string|max:255',
        ]);
        $address = $request->input('address');
        $name = $request->input('name');
        $text = $request->input('text');

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host =  env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = env('MAIL_PORT');

        $mail->setFrom($address, $name);
        $mail->addAddress($address, $name);
        $mail->addAddress('siposbalint0306@gmail.com', 'balintsipos');
        $mail->isHTML(false);

        $mail->Subject = $name . "-" . $address;
        $mail->Body = $text;

        if (!$mail->send()) {
            echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';

        }

        $mail->smtpClose();
    }

    public function Subscribe(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'name' => 'required|string',
        ]);

        $address = $request->input('email');
        $name = $request->input('name');

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host =  env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = env('MAIL_PORT');

        $mail->setFrom('siposbalint0306@gmail.com', 'balintsipos');
        $mail->addAddress($address, $name);
        $mail->isHTML(false);

        $mail->Subject ="Sikeres feliratkozs a körlevélre\n\nLeiratkozás:\n localhost:8000/";

        if (!$mail->send()) {
            echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';

        }
        $mail->smtpClose();

        return redirect()->back()->with('Success', 'Sikeres feliratkozás');
    }
}
