<?php

namespace App;


class View
{
    protected $data = [];
    public function assing($name, $value)
    {
        $this->data[$name] = $value;
    }

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