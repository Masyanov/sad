<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>
form {
	width:300px;
}
form input, form textarea {
	width:100%;
}
</style>
</head>
<body>
<form method="POST" id="feedback-form">
	<input type="text" name="nameFF" required placeholder="Имя" x-autocompletetype="name">
	<input type="email" name="contactFF" required placeholder="E-mail" x-autocompletetype="email">
	<textarea name="messageFF" required rows="5"></textarea>
	<input type="submit" value="отправить">
</form>
<script>
document.getElementById('feedback-form').onsubmit = function(){
  var http = new XMLHttpRequest();
  http.open("POST", "contacts.php", true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  http.send("nameFF=" + this.nameFF.value + "&contactFF=" + this.contactFF.value + "&messageFF=" + this.messageFF.value);
  http.onreadystatechange = function() {
    if (http.readyState == 4 && http.status == 200) {
      alert(http.responseText + ', Ваше сообщение получено.\nНаши специалисты ответят Вам в ближайшее время.\nБлагодарим за проявленный интерес!');
    }
  }
  http.onerror = function() {
    alert('Извините, данные не были переданы');
  }
  return false;
}
</script>
</body>
</html>