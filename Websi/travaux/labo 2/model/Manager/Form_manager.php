<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_manager
 *
 * @author loic
 */
class Form_manager
{

    /**
     * Valide un formulaire
     * @param Generic_form $f
     */
    public static function validateForm(Generic_form $f)
    {
        $fieldname;
        try
        {
            foreach ($f->getFieldList() as $field)
            {
                $fieldname = $field->getName();
                foreach ($field->getValidators() as $validator)
                {
                    $validator->valide($field->getValue());
                }
            }
        }
        catch (Validateur_exception $e)
        {
            throw new Exception("Champs ".$fieldname." : ".$e->getMessage());
        }
    }

}

?>
