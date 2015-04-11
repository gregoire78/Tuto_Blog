<?php
namespace Core\HTML;
/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
/**
 * Class Form
 * @package Core\HTML
 */
class Form
{
    /**
     * données utilisées dans le formulaire
     * @var array
     */
    protected $data;
    /**
     * Tag utilisé pour entourer les champs
     * @var string
     */
    public $surround = 'p';

    /**
     * constructeur
     * @param array $data
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * code html à entourer
     * @param $html
     * @return string
     */
    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * index de la valeur à recuprerer
     * @param $index
     * @return string
     */
    protected function getValue($index)
    {
        if(is_object($this->data))
        {
            return $this->data->$index;
        }
        return isset($this->data[$index])? $this->data[$index] : null;
    }


    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround('<input type="'.$type.'" name="'.$name.'" value="' . $this->getValue($name) . '">');
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}