<?php

class Model_Mail extends Model
{
    public function validSend($mail = null, $name = null, $theme = null, $text = null)
    {
        $result = true;
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $result = 'ошибка! Email указан некорректно';
            return $result;
        }

        if (empty(trim($name))) {
            $result = 'ошибка! Вы не представились!';
            return $result;
        }

        if (empty(trim($theme))) {
            $result = 'ошибка! Вы не указали тему письма';
            return $result;
        }

        if (empty(trim($text))) {
            $result = 'ошибка! Вы не ввелиb сообщение';
            return $result;
        }

        if ($result === true) {
            $text = "Вам было отправлено сообщение от пользователя $name ($mail)    

$text";
            $result = mail('admin@site.ru', $theme, $text) ? 'письмо успешно отправлено' : 'неизвестная ошибка при отправке!';
            
        }
        
		return $result;
    }
}