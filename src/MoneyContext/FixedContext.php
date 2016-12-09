<?php

namespace Brick\Money\MoneyContext;

use Brick\Money\Currency;
use Brick\Money\MoneyContext;

use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;

/**
 * Adjusts the scale of the result to a fixed value.
 */
class FixedContext implements MoneyContext
{
    /**
     * @var int
     */
    private $scale;

    /**
     * @var int
     */
    private $roundingMode;

    /**
     * @param int $scale
     * @param int $roundingMode
     */
    public function __construct($scale, $roundingMode = RoundingMode::UNNECESSARY)
    {
        $this->scale        = (int) $scale;
        $this->roundingMode = (int) $roundingMode;
    }

    /**
     * {@inheritdoc}
     */
    public function applyTo(BigNumber $amount, Currency $currency, $currentScale)
    {
        return $amount->toScale($this->scale, $this->roundingMode);
    }
}