<?php
namespace App\Validation;

class Nux extends \CodeIgniter\Model
{
    public $validationResult = null;
    public $suggestions = [];
    public $code;

    /**
     * Create a NUX Validation.
     *
     * @param string $code
     * @param array  $validationResult
     * @param array  $suggestions
     */
  
    public function __construct(string $code = 'OK', array $validationResult = [], array $suggestions = [])
    {
        $this->code = $code;

        if (!empty($validationResult)) {
            $this->validationResult = $validationResult;
        }

        if (!empty($suggestions)) {
            $this->suggestions = $suggestions;
        }
    }
}
