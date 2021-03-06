<?php

namespace DarrynTen\Pslayers\Layers\Layer;

use DarrynTen\Pslayers\Layers\BaseLayer;
use DarrynTen\Pslayers\Validators\ColourValidator;
use DarrynTen\Pslayers\Exceptions\PslayersException;

/**
 * Pslayers Plasma Layer
 *
 * @category Layer
 * @package  Pslayers
 * @author   Darryn Ten <darrynten@github.com>
 * @license  MIT <https://github.com/darrynten/pslayers/LICENSE>
 * @link     https://github.com/darrynten/pslayers
 */
class PlasmaLayer extends BaseLayer
{
    /**
     * Construct
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);

        $this->canvas->newPseudoImage($config['width'], $config['height'], 'plasma:');
        $this->canvas->setImageFormat('png');
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
            'composite' => $this->composite(),
        ];
    }
}
