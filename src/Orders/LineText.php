<?php
namespace Pilulka\Edi\Orders;

class LineText
{
    /**
     * @var array there are 5 texts one is mandatory
     */
    private $texts;

    /**
     * @param string $text1
     */
    public function __construct($text1)
    {
        $this->addText($text1);
    }

    private function addText($text)
    {
        $maxLength = 70;
        if (mb_strlen($text) > $maxLength) {
            throw new \InvalidArgumentException("length of text must be <= $maxLength");
        }
        $this->texts[] = $text;
    }

    public function setText2($text)
    {
        $this->addText($text);
    }

    public function setText3($text)
    {
        $this->addText($text);
    }

    public function setText4($text)
    {
        $this->addText($text);
    }

    public function setText5($text)
    {
        $this->addText($text);
    }

    public function fillXml($number, \SimpleXMLElement $element)
    {
        $element->addChild("text_number", $number);
        foreach ($this->texts as $index => $text) {
            $element->addChild("text_" . ($index + 1), $text);
        }
    }
}
