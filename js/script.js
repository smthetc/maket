function prepare_xml() { // функция отправки и приема данных (ajax)
    var formData = new FormData(document.forms.train);
    console.dir(formData); // что там отправляем то?
    var xhr = new XMLHttpRequest(); //создаем объект
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) { //проверяем ответ на ошибки
            // если норм то выводим
            document.getElementById("trainstop").innerHTML = this.responseText;
        }
        else {
            // если нет сообщаем об ошибке
            document.getElementById("trainstop").innerHTML = "Error";
        }
    };
    xhr.open("POST", "/action.php"); // post запрос на конкретный контроллер
    xhr.send(formData); //отпраляем данные

}