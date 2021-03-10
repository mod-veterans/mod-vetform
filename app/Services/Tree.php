<?php


namespace App\Services;


class Tree extends \DOMDocument
{
    /**
     * @var Tree
     */
    private static $instance = null;

    /**
     * @var \DOMDocument
     */
    private $_dom;


    private function __construct() {
    }

    public static function getInstance($tree = null)
    {
        if (self::$instance === null) {
            self::$instance = new Tree();
        }

//        <afcs>
//            <about-you>
//                <personal-details>
//                    <your-name>
//                        <full-name/>
//                        <other-name/>
//                    </your-name>
//                </personal-details>
//                <supporting-documents>
//                    <documents>
//                        <document>
//                            <file/>
//                            <file/>
//                            <file/>
//                            <file/>
//                            <file/>
//                        </document>
//                    </documents>
//                </supporting-documents>
//            </about-you>
//        </afcs>

        return self::$instance;
    }

    public function addNode() {}

    public function removeNode() {}
}
