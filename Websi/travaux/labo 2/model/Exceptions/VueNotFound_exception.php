<?php
class VueNotFound_exception extends Exception
{

    public function __construct($path)
    {
        parent::__construct("Vue inconnue: " .$path);
    }
}
?>
