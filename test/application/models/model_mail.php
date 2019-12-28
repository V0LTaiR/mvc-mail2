<?php

class Model_Mail extends Model
{
    public function validSend($mail = null, $name = null, $theme = null, $text = null)
    {
        $result = "";
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $result .= 'ошибка! Email указан некорректно</br>'. PHP_EOL;
        }

        if (empty(trim($name))) {
            $result .= 'ошибка! Вы не представились!</br>' . PHP_EOL;
        }

        if (empty(trim($theme))) {
            $result .= 'ошибка! Вы не указали тему письма</br>'.PHP_EOL;
        }

        if (empty(trim($text))) {
            $result .= 'ошибка! Вы не ввели сообщение</br>' . PHP_EOL;
        }

        if ($result === "") {
            $text = "Вам было отправлено сообщение от пользователя $name ($mail)    

$text";
            $result = mail('admin@site.ru', $theme, $text) ? 'письмо успешно отправлено' : 'неизвестная ошибка при отправке!';
        }
        return $result;
    }
}
