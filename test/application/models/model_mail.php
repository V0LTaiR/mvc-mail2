<?php

class Model_Mail extends Model
{
    public function validSend($mail = null, $name = null, $theme = null, $text = null)
    {
        $result = "";
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $result .= 'error! Email is incorrect</br>' . PHP_EOL;
        }

        if (empty(trim($name))) {
            $result .= 'error! You did not introduce yourself!</br>' . PHP_EOL;
        }

        if (empty(trim($theme))) {
            $result .= 'error! You did not specify the theme</br>' . PHP_EOL;
        }

        if (empty(trim($text))) {
            $result .= 'error! You did not enter a message</br>' . PHP_EOL;
        }

        if ($result === "") {
            $text = "A message was sent to you from $name ($mail)    

$text";
            $result = mail('admin@site.ru', $theme, $text) ? 'success' : 'Unknown sending error!';
        }
        return $result;
    }

    public function resultMail($result)
    {
        $json = json_encode($result);
        echo $json;
    }
}