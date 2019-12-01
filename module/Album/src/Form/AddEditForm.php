<?php

namespace Album\Form;
use Zend\Form\Form;

class AddEditForm extends Form
{
    public function init() 
    {
        $this->add([
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
        ]);
    }
}