<?php

require_once 'Sessions.php';
class Validator
{
    private $errors = [];

    public function validate($inputs, $rules)
    {
       

        foreach ($rules as $field => $conditions) {
            foreach ($conditions as $key => $value) {
                if ($value === 'required') {
                    Validator::validate_require($field, $inputs[$field] ?? null);
                } elseif ($value === 'email') {
                    Validator::validate_email($field, $inputs[$field] ?? null);
                } elseif ($value === 'numeric') {
                    Validator::validate_numeric($field, $inputs[$field] ?? null);
                } elseif ($key === 'min') {
                    Validator::validate_min_length($field, $inputs[$field] ?? '', $value);
                } elseif ($key === 'max') {
                    Validator::validate_max_length($field, $inputs[$field] ?? '', $value);
                }
            }
        }
        if(!empty($this->errors)){
            Sessions::set('errors' , $this->errors);
        }
    }

        private function validate_require($field, $value)
        {
            if (empty($value)) {
                Sessions::set('errors', $field . "is required");
            }
        }
    
        private function validate_email($field, $value)
        {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                Sessions::set('errors', $field . "invalid");
                
            }
        }
    
        private function validate_numeric($field, $value)
        {
            if (!is_numeric($value)) {
                Sessions::set('errors', $field . "must be a number");
                
            }
        }
    
        private function validate_min_length($field, $value, $min_length)
        {
            if (strlen($value) < $min_length) {
                Sessions::set('errors' ,'sorry' . $field . 'must be at least' . $min_length . 'characters.');
            }
        }
    
        private function validate_max_length($field, $value, $max_length)
        {
            if (strlen($value) > $max_length) {
                Sessions::set('errors' ,'sorry' . $field . 'must not exceed ' . $max_length . 'characters.');
    
            }
        }
    
        public function hasErrors()
        {
            
            return Sessions::has('errors');
        }
    
        public function getErrors()
        {
            return Sessions::getAll('errors');
        }
    }



















?>
