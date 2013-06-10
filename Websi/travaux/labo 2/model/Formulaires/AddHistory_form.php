<?php

class AddHistory_form extends Generic_form
{

    public function __construct()
    {
        parent::__construct("addhistory", "/MVC/Task/add_check", Generic_form::METHOD_POST);
    }

}

?>
