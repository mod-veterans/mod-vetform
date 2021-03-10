<?php


namespace App\Services\Forms;


use Illuminate\Support\Str;

abstract class BaseTask
{
    abstract protected function setPages();

    /**
     * @var null
     */
    protected $_id = null;

    /**
     * @var array
     */
    protected $pages = [];

    /**
     * @var bool
     */
    protected $hasSummary = false;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var null
     */
    private $_pages = null;

    /**
     * @var string
     */
    private $_namespace;

    /**
     * BaseTask constructor.
     */
    public function __construct($namespace)
    {
        $this->_namespace = $namespace . '/' . $this->getId();
        $this->setPages();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
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
     * @return array
     */
    public function pages(): array
    {
        if (is_null($this->_pages)) {
            $this->_pages = [];

            foreach ($this->pages as $page) {
                array_push($this->_pages, $page);
            }
        }

        return $this->_pages;
    }

    /**
     * @param $pageName
     * @return int|string
     */
    public function getPageIndex($pageName)
    {
        foreach ($this->pages() as $index => $page) {
            if (isset($page['page'])) {
                if ($page['page']->getId() === $pageName) {
                    return $index;
                }
            }
        }

        return 0;
    }

    /**
     * @param $fromIndex
     */
    public function nextPage($fromIndex)
    {
        if ($this->_pages[$fromIndex]) {
            $nextPage = $this->_pages[$fromIndex]['next'] ?? null;

            if (is_numeric($nextPage)) {
                return $this->_pages[$nextPage];
            }

            if ($nextPage instanceof \Closure) {
                $nextPage();
            }

            if ($nextPage === BasePage::SUMMARY_PAGE) {
                return BasePage::SUMMARY_PAGE;
            }
        }
    }

    /**
     * @return string
     */
    public function nextPageUrl()
    {

    }

    /**
     * @param $value
     * @return string
     */
    public function __get($value)
    {
        switch ($value) {
            case 'namespace';
                return $this->_namespace;
        }
    }
}
