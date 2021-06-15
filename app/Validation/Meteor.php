<?php
namespace App\Validation;

class Meteor {

    public function figure(): bool
    {
        $error = lang('errors.figure');
        return false;
    }
  
    public function pattern(string $str = null, string $val, array $data): bool
    {
        $regex = '/^(' . str_replace('OR', '|', $val) . ')$/u';
        if(!preg_match($regex, $str)) {
            $error = lang("errors.pattern");
            return false;
        }
        return true;
    }
}
