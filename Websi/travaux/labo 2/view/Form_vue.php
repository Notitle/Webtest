<?php

class Form_vue
{

    public static function getHTML(Generic_form $form)
    {
        $output = "<form name='" . $form->getName() . "' method='" . $form->getMethod() . "' action='" . $form->getTarget() . "'>";
        $array = $form->getFieldList();

        foreach ($array as $field)
        {
            $output.= $field->getLabel() != null ? "<label>" . $field->getLabel() . "</label>" : null;

            switch ($field->getType())
            {
                case "text":
                    $output.= " <input class='" . $field->getClass() . "' type ='text' name='" . $field->getName() . "' value='" . $field->getValue() . "' /> ";
                    break;
                case "password":
                    $output.= " <input class='" . $field->getClass() . "' type ='password' name='" . $field->getName() . "' value='" . $field->getValue() . "' /> ";
                    break;
                case "radio":
                    $output.= " <input type ='radio' name='" . $field->getName() . "' value='" . $field->getValue() . "' /> ";
                    break;
                case "submit":
                    $output.= " <input class='" . $field->getClass() . "' type='submit' name='" . $field->getName() . "' value='" . $field->getValue() . "'/> ";
                    break;
                case "checkbox":
                    $output.= " <input type='checkbox' name='" . $field->getName() . "' value='" . $field->getValue() . "'/> ";
                    break;
                case "hidden":
                    $output.= " <input type='hidden' name='" . $field->getName() . "' value='" . $field->getValue() . "'/> ";
                    break;
                case "textarea":
                    $output.= " <textarea  name='" . $field->getName() . " row='" . $field->getRow() . " colc='" . $field->getCols() . "' >" . $field->getValue() . "</textarea> ";
                    break;
                case "select":
                    $output.= " <select name='" . $field->getName() . "'/>";
                    foreach ($field->getOption_liste() as $option)
                    {
                        $selected = $option->getIsSelected() ? "selected" : null ;
                        $output.="<option value='" . $option->getValueOption() . "' ".$selected." >".$option->getContent()."</option>";
                    }
                    $output.="</select>";

                    break;
                //checkbox, hidden, 
            }
            $output .= "<br />";
        }
        $output .= "</form>";
        return $output;
    }

}

?>
