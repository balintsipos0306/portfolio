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
        $mail->CharSet = 'UTF-8';

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
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('siposbalint0306@gmail.com', 'balintsipos');
        $mail->addAddress($address, $name);
        $mail->isHTML(true);

        $mail->addEmbeddedImage(public_path('webp/Logó_email.jpg'), 'logoimg');
        $mail->Subject ="Sikeres feliratkozás";
        $mail->Body = '
                <div style=" margin: auto; padding: 1em; color:#3F4E4F; margin: 1em; border-radius: 10px;font-family: Trebuchet MS; box-shadow: 20px 20px 50px grey;">
                <div style="text-align: center;"><img src="cid:logoimg" style="margin: auto; height: 5em; width: auto;"></div>
                <h1 style="margin: auto; text-align: center;">Kedves ' . $name . '</h1>
                <hr>
                <p>Köszönöm hogy feliratkoztál a hírlevelemre
                Minden új blog bejegyzésről, vagy webshop termékekről elsőként fogsz értesítést kapni, hogy ne maradj le semmiről</p>
                <br>
                <div style="margin: auto;text-align: center;"><a href="http://localhost:8000/unsubscribe" style="background-color: #3F4E4F; color: white;padding: 10px; border-radius: 10px; text-decoration: none;">Leiratkozás</a></div>
                </div>
            ';

        if (!$mail->send()) {
            echo 'Email not sent. An error was encountered: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent.';

        }
        $mail->smtpClose();

        return redirect()->back()->with('Success', 'Sikeres feliratkozás');
    }
}
