<?php

/**
 * Description of Abs_controller
 *
 * @author loic
 */
abstract class Abs_controller
{

    protected $getGetArray;
    protected $getPostArray;

    public function __construct()
    {
        $this->getGetArray = $_GET;
        $this->getPostArray = $_POST;

        foreach ($this->getGetArray as $key => $value)
        {
            $this->getGetArray[$key] = htmlspecialchars($value);
        }
        foreach ($this->getPostArray as $key => $value)
        {
            $this->getPostArray[$key] = htmlspecialchars($value);
        }
    }

}

?>
