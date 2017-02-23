<?php

namespace DarrynTen\Pslayers\Layers\Layer;

use Imagick;

use DarrynTen\Pslayers\Layers\BaseLayer;
use DarrynTen\Pslayers\Layers\LayerInterface;
use DarrynTen\Pslayers\PslayersException;

/**
 * Pslayers Text Layer
 *
 * @category Layer
 * @package  Pslayers
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/pslayers/LICENSE>
 * @link     https://github.com/darrynten/pslayers
 */
class TextLayer extends BaseLayer implements LayerInterface
{
    /**
     * Text Content
     *
     * @var string $text
     */
    public $text;

    public $font;
    public $size;
    public $colour;

    // flags
    public $wrap;

    public function __construct(array $config)
    {
        $this->text(
            !empty($config['text']) ? $config['text'] : ''
        );

        $this->font(
            !empty($config['font']) ? $config['font'] : 'serif'
        );

        $this->size(
            !empty($config['size']) ? $config['size'] : 16
        );

        parent::__construct($config);
    }

    /**
     * Get and set the font
     *
     * @param null|int $font The font
     *
     * @return boolean|string
     */
    public function font(string $font = null)
    {
        if ($font === null) {
            return $this->font;
        }

        return $this->font = $font;
    }

    /**
     * Get and set the size
     *
     * @param null|int $size The size
     *
     * @return boolean|int
     */
    public function size(int $size = null)
    {
        if ($size === null) {
            return $this->size;
        }

        return $this->size = $size;
    }

    /**
     * Get and set the text
     *
     * @param null|string $text The text
     *
     * @return boolean|string
     */
    public function text(string $text = null)
    {
        if ($text === null) {
            return $this->text;
        }

        return $this->text = $text;
    }

    /**
     * Returns an representation of the layer
     *
     * @return array
     */
    public function getLayerDetailsArray()
    {
        return [
            'id' => $this->id,
            'opacity' => $this->opacity(),
            'width' => $this->width(),
            'height' => $this->height(),
            'positionX' => $this->positionX(),
            'positionY' => $this->positionY(),
            'text' => $this->text(),
        ];
    }
}
