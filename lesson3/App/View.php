<?php

namespace App;

class View
{
    use SettingReading;

    public function display($tamplate)
    {
        echo $this->render($tamplate);
    }

    public function render($template)
    {
        ob_start();
        foreach ($this->data as $var => $value) {
            $$var = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}