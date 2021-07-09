<?php


namespace App\Services\Forms;


use App\Services\Application;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class BasePage
 * @package App\Services\Forms
 *
 * @property $title string
 * @property $questions array
 * @property $namespace string
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
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    protected string $_title = '';

    /**
     * @var string
     */
    protected string $summary = '';

    /**
     * @var string
     */
    protected string $closingStatement = '';

    /**
     * @var array
     */
    protected array $_questions = [];

    /**
     * @var string
     */
    private string $_namespace;

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
        $this->_namespace = $namespace . '/' . $this->getId();
        $this->_data = $data;

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
     * @param $index
     * @param $name
     */
    public function namespaceQuestion($index, $name): void
    {
        $this->_questions[$index]['options']['field'] = $name;
    }

    /**
     * @param array $data
     */
    public function storeResponse($data = [], $stackID = null)
    {
        if ($stackID) {
            $task = Application::getInstance()->getTaskForPageByNamespace($this->namespace);
            if ($task->isStackable()) {
                if ($task->isValidStack($stackID)) {
                    $stack = $task->stack;

                    foreach ($this->_questions as $questionIndex => $question) {
                        $field = $this->_questions[$questionIndex]['options']['field'];

                        unset($stack[$stackID][$field]);
                        session()->forget($task->stackName . '.' . $stackID . '.' . $field);
                        if (isset($data[$field])) {
                            if (($data[$field] instanceof UploadedFile)) {
                                /** @var UploadedFile $data */
                                $stack[$stackID][$field] = [];
                                $stack[$stackID][$field]['filename'] = $data[$field . '::filename'];
                                $stack[$stackID][$field]['mnemonic'] = $data[$field . '::mnemonic'];
                            } else {
                                $stack[$stackID][$field] = $data[$field] ?? '';
                            }
                        }
                    }

                    session([$task->stackName => $stack]);
                }
            }
        } else {
            foreach ($this->_questions as $questionIndex => $question) {
                $field = $this->_questions[$questionIndex]['options']['field'];

                session()->forget($field);
                if(isset($data[$field])) {
                    if (($data[$field] instanceof UploadedFile)) {
                        /** @var UploadedFile $data */
                        $stack[$field] = [];
                        $stack[$field]['filename'] = $data[$field . '::filename'];
                        $stack[$field]['mnemonic'] = $data[$field . '::mnemonic'];
                    } else {
                        $stack[$field] = $data[$field] ?? null;
                    }

                    session([$field => $stack[$field]]);
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function isStackable()
    {
        return key_exists('App\Services\Traits\Stackable', class_uses($this));
    }

    /**
     * @param $value
     * @return array|string
     */
    public function __get($value)
    {
        switch ($value) {
            case 'questions':
                return $this->_questions ?? [];

            case 'title';
                return $this->_title;

            case 'name';
                return $this->_title;

            case 'namespace';
                return $this->_namespace;
        }
    }
}
