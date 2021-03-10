<?php


namespace App\Services\Forms;


use Illuminate\Support\Str;

/**
 * Class BasePage
 * @package App\Services\Forms
 *
 * @property $title string
 * @property $questions array
 */
abstract class BasePage
{
    const SUMMARY_PAGE = 'SUMMARY_PAGE';

    abstract function setQuestions(): void;

    /**
     * @var null
     */
    protected $_id = null;

    /**
     * @var bool
     */
    protected $hasSummary = false;

    /**
     * @var array
     */
    protected $questions = [];

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $summary = '';

    /**
     * @var array
     */
    protected $_questions = [];

    /**
     * @var string
     */
    private $_namespace;

    /**
     * @var mixed|null
     */
    private $_taskClass = null;

    /**
     * @var array
     */
    private $_data = [];

    /**
     * BasePage constructor.
     */
    public function __construct($namespace, $data = [])
    {
        $this->_namespace =  $namespace . '/' . $this->getId();
        $this->_data      = $data;

        $this->setQuestions();
    }

    /**
     * @return string|null
     */
    public function getId()
    {
        if (isset($this->_id))
            return $this->_id;

        $path = explode('\\', get_called_class());
        return Str::kebab(end($path));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    private function questions(): array
    {
        if (is_null($this->_questions)) {
            $this->_questions = [];

            foreach ($this->questions as $question) {
                array_push($this->_questions, $question);
            }
        }

        return $this->_questions;
    }

    /**
     * @param $index
     * @param $name
     */
    public function namespaceQuetion($index, $name): void
    {
        $this->_questions[$index]['options']['field'] = $name;
    }

    public function saveResponses()
    {

    }

    public function __get($value)
    {
        switch ($value) {
            case 'questions':
                return $this->questions();

            case 'title';
                return $this->title;

            case 'namespace';
                return $this->_namespace;
        }
    }
}
