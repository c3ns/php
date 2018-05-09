<?php
namespace Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Models\Db\DB;
use PDO;

class Mail extends DB
{
    private $mailsTo;
    private $subject;
    private $content;
    private $files;
    private $mailer;

    public function __construct($mails,$subject,$content,$files)
    {
        $this->mailsTo = $mails;
        $this->subject = $subject;
        $this->content = $content;
        $this->files = $files;
        $this->mailer = new PHPMailer(true);
    }
    private function save()
    {
        $sql = "INSERT INTO mails (mail_to, subject, content, files) VALUES (:mail_to, :subject, :content, :files)";

        $data = [
            'mail_to' => $this->mailsTo,
            'subject' => $this->subject,
            'content' => $this->content,
            'files' => implode(",",$this->files)
        ];
        parent::query($sql,$data);
    }
    public function sendMail(){
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'in-v3.mailjet.com ';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'acbe4ed37c11af6f9ae8c895436fc71f';
            $this->mailer->Password = 'd975723bc5ee81eae7d5ca33a21717e4';
            $this->mailer->Port = 25;
            $this->mailer->setFrom('c3ns.php@gmail.com');

            foreach ($this->mailsToArray() as $adr){
                $this->mailer->addAddress("".$adr."");
            }
            $this->mailer->addReplyTo('noreply@noreply.re', 'No reply');

            $this->mailer->Subject = "".$this->subject."";
            $this->mailer->isHTML(true);
            $this->mailer->AltBody = 'Cia nera htmlo, nes ne visi EMAIL klientai ji palaiko';
            $this->mailer->Body    = "".$this->content."";
            foreach ($this->files as $f){
                if($f != false){
                    $uploaddir = "uploads\\";
                    $uploadfile = $uploaddir . ($f);
                    $this->mailer->addAttachment($uploadfile);
                }
            }
            $this->mailer->send();
            $this->mailer->SMTPDebug = 2;

            $this->save();

            echo 'Balandziai nunese laiska...';
        } catch (Exception $e) {
            echo 'Nedaskrido balandziai 🙁 Mailer Error: ', $this->mailer->ErrorInfo;
        }
    }
    private function mailsToArray(){
        return explode(",", $this->mailsTo);
    }
}