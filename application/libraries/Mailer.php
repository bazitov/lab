<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer {
    public function Mailer() {
        require_once('PHPMailer/PHPMailerAutoload.php');
    }
}