<?php

namespace App\Controller\AbstractController;

class AbstractController
{
    public function render(string $template, array $args = [])
    {
        $path = __DIR__ . "/../../" . $template;
        
        $file = fopen($path, "r");

        if(!$file)
        {
            echo "Error : \"" . $path . "\" not found";
            return;
        }

        fclose($file);

        $content = file_get_contents($path);
        $newContent = "";
        $inVar = false;
        $var = "";

        for($i = 0 ; $i < strlen($content) ; $i++)
        {
            if($content[$i + 0] == "{" && $content[$i + 1] == "{")
            {
                $inVar = true;
            }

            else
            if($content[$i + 0] == "}" && $content[$i - 1] == "}")
            {
                $inVar = false;
                
                $nameVar = "";
                for($j = 0 ; $j < strlen($var) ; $j++)
                {
                    if($var[$j] != "{" && $var[$j] != "}" && $var[$j] != " ")
                    {
                        $nameVar .= $var[$j];
                    }
                }
                $var = "";

                if(!isset($args[$nameVar]))
                {
                    echo "Error : " . $nameVar . " does not exist";
                    return;
                }

                $newContent .= $args[$nameVar];
                $nameVar = "";
            }

            else
            if(!$inVar)
            {
                $newContent .= $content[$i];
            }

            else
            {
                $var .= $content[$i];
            }
        }

        echo $newContent;
    }
}