<?
include_once 'connectDb.php';
include_once 'dbFns.php';
$sql = "SELECT mail_1 FROM requisites WHERE id='1'"; $data = pageData($sql);
$mailto = $data['mail_1'];

if($_POST) { // если передан массив POST
	if($_POST["name"]) $name = htmlspecialchars($_POST["name"]);
        if($_POST["phone"]) $phone = htmlspecialchars($_POST["phone"]);
        if($_POST["addr"]) $addr = htmlspecialchars($_POST["addr"]);
        else $addr = 'не указан';
        if($_POST["email"]) $email = htmlspecialchars($_POST["email"]);
        else $email = 'не указан';
        if($_POST["theme"]) $theme = htmlspecialchars($_POST["theme"]);
        if($_POST["message"]) $message = htmlspecialchars($_POST["message"]);
        else $message = 'отсутствует';
        $sendtime = date('H:i:s');
	$json = array();

	function mime_header_encode($str, $data_charset, $send_charset) { // функция преобразования заголовков в верную кодировку 
            if($data_charset != $send_charset)
            $str=iconv($data_charset,$send_charset.'//IGNORE',$str);
            return ('=?'.$send_charset.'?B?'.base64_encode($str).'?=');
	}
	/* супер класс для отправки письма в нужной кодировке */
	class TEmail {
	public $from_email;
	public $from_name;
	public $to_email;
	public $to_name;
	public $to_phone;
	public $data_charset='UTF-8';
	public $send_charset='windows-1251';
	public $body='';
	public $type='text/plain';

	function send(){
		$dc=$this->data_charset;
		$sc=$this->send_charset;
		$enc_to=mime_header_encode($this->to_name,$dc,$sc).' <'.$this->to_email.'>';
		$enc_subject=mime_header_encode($this->subject,$dc,$sc);
		$enc_from=mime_header_encode($this->from_name,$dc,$sc).' <'.$this->from_email.'>';
		$enc_body=$dc==$sc?$this->body:iconv($dc,$sc.'//IGNORE',$this->body);
		$headers='';
		$headers.="Mime-Version: 1.0\r\n";
		$headers.="Content-type: ".$this->type."; charset=".$sc."\r\n";
		$headers.="From: ".$enc_from."\r\n";
		return mail($enc_to,$enc_subject,$enc_body,$headers);
            }
	}
        
$mail = "
 ЗАПРОС С САЙТА УК 'ЕвроМисто'
+----------------------------------------------------------------------------------------------------------+
 Отправлен в: $sendtime
+----------------------------------------------------------------------------------------------------------+
 Имя: $name
 Адрес: $addr
 Телефон: $phone
 E-mail: $email
 Тема: $theme
+----------------------------------------------------------------------------------------------------------+
 Cообщение: $message
";
	$emailgo= new TEmail; // инициализируем супер класс отправки
	$emailgo->from_email= $email; // от кого
	$emailgo->from_name= 'Запрос от:';
	$emailgo->to_name= 'ЖЕК "Европейське Мiсто"';
	$emailgo->subject= "Запрос с сайта УК ЕвроМисто"; // тема
	$emailgo->body= $mail; // сообщение
	$emailgo->to_email= $mailto; // кому
	$emailgo->send(); // отправляем
	$emailgo->to_email= 'info@leocraft.com'; // кому
	$emailgo->send(); // отправляем

	$json['error'] = 0; // ошибок не было

	echo json_encode($json); // выводим массив ответа
} else { // если массив POST не был передан
	echo 'GET LOST!'; // высылаем
}
unset($_POST);
$date = date('Y-m-d');
dbConnect();
mysql_query(" INSERT INTO mail (date,send,name,addr,phone,mail,theme,message) VALUES ('$date','$sendtime','$name','$addr','$phone','$email','$theme','$message') ");
?>
