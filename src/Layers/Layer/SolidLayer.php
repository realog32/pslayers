<?php

namespace DarrynTen\Pslayers\Layers\Layer;

use DarrynTen\Pslayers\Layers\BaseLayer;
use DarrynTen\Pslayers\Validators\ColourValidator;
use DarrynTen\Pslayers\Exceptions\PslayersException;

/**
 * Pslayers Blank Layer
 *
 * @category Layer
 * @package  Pslayers
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/pslayers/LICENSE>
 * @link     https://github.com/darrynten/pslayers
 */
class SolidLayer extends BaseLayer
{
    /**
     * Fill Colour
     *
     * @var string $colour
     */
    public $colour;

    /**
     * Construct
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);

        if (!isset($config['colour'])) {
            throw new PslayersException('Missing Solid Layer colour.');
        }

        $this->colour($config['colour']);

        $this->canvas->newImage($config['width'], $config['height'], $config['colour']);
        $this->canvas->setImageFormat('png');
    }

    /**
     * Get and set the colour
     *
     * @param null|int $colour The colour
     *
     * @return boolean|string
     */
    public function colour(string $colour = null)
    {
        ColourValidator::isValidColour($colour);

        if ($colour === null) {
            return $this->colour;
        }

        return $this->colour = $colour;
    }

    /**
     * Alias for colour / color
     */
    public function color(string $color = null)
    {
        return $this->colour($color);
    }


    /**
     * Returns an representation of the layer
     *
     * @return array
     */
    public function getLayerDetailsArray(): array
    {
        return [
            'id' => $this->id,
            'opacity' => $this->opacity(),
            'width' => $this->width(),
            'height' => $this->height(),
            'positionX' => $this->positionX(),
            'positionY' => $this->positionY(),
            'composite' => $this->composite(),
            'colour' => $this->colour(),
        ];
    }
}
