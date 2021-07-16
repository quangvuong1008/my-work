<?php

namespace App\Helpers\Validations;


class AppValidation
{
    public function array($input, $params)
    {
        //        echo '<pre>'; print_r($input); die;
    }

    public function trim($input, $params)
    {
        //        echo '<pre>'; print_r($input); die;
    }

    public function convert_strong_to_html($input)
    {
        $result = "<p>";

        for ($i = 0; $i < strlen($input); $i++) {
            if (ord($input[$i]) == 10) {
                $result .= "</p>";
                if (ord($input[$i + 1]) == 10) {
                    $result .= "<br>";
                    $i++;
                }
                $result .= "<p>";
            } else {
                $result .= $input[$i];
            }
        }

        $result .= "</p>";
        return $result;
    }
}
