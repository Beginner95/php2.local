<?php

namespace App;

class View
    implements \Countable, \Iterator
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

    public function current()
    {
       return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return null !== key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function count()
    {
        return count($this->data);
    }
}