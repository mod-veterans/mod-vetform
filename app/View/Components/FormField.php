<?php


namespace App\View\Components;

use App\Services\Application;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class FormField extends Component
{
    /**
     * @var string
     */
    public $_id;

    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $labelExtra;

    /**
     * @var string
     */
    public $value;

    /**
     * @var false|mixed
     */
    public $hint;

    /**
     * @var mixed
     */
    public $selected;

    /**=
     * @var array
     */
    public $options = [];

    /**
     * @var bool
     */
    public $mandatory = true;

    /**
     * @var integer
     */
    public $characterLimit = false;

    /**
     * @var bool
     */
    public $fullWidth = false;

    /**
     * @var bool
     */
    public $autocomplete = false;

    /**
     * @var bool
     */
    public $hideLabel = false;

    /**
     * @var bool
     */
    public $stackValue = null;

    /**
     * Create a new component instance.
     *
     * @param null $field
     * @param string $label
     * @param null $value
     * @param bool $hint
     * @param null $selected
     * @param array $options
     * @param null $labelExtra
     * @param bool $mandatory
     * @param int|false $characterLimit
     * @param bool $fullWidth
     * @param bool $autocomplete
     * @param bool $hideLabel
     */
    public function __construct($options = [])
    {
        foreach ($options as $key => $value) {
            $this->$key = $value;
        }

        $validationRules = is_string($options['validation'] ?? []) ? explode('|', $options['validation']) : $options['validation'] ?? [];
        $this->mandatory = in_array('required', $validationRules, true);

        $this->_id = Str::lower(Str::snake(
            str_replace(['/'], ' or ',
                str_replace(['(', ')'], '', $option['field'] ?? 'Option')
            )
        ));
    }
}
