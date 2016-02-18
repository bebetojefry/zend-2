<?php

namespace Application\Form;

use Zend\Form\Form;

class UserForm extends Form {
    public function __construct($name = null)
    {
        parent::__construct('user');
      
        $this->add(array(
            'name' => 'firstname',
            'type' => 'Text'
        ));
        
        $this->add(array(
            'name' => 'lastname',
            'type' => 'Text'
        ));
        
        $this->add(array(
            'name' => 'username',
            'type' => 'Text'
        ));
        
        $this->add(array(
            'name' => 'password',
            'type' => 'Password'
        ));
        
        $this->add(array(
            'name' => 'status',
            'type' => 'Checkbox'
        ));
        
        $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Register',
                 'id' => 'submitbutton',
             ),
         ));
    }
}
