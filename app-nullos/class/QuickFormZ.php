<?php

/**
 * A translated version of the QuickForm.
 *
 */
class QuickFormZ {

    public static function create()
    {
        $form = new QuickForm\QuickForm();
        $form->validationTranslateFunc = function($msg){

            return __($msg, 'form-validation');
        };
        return $form;
    }
}