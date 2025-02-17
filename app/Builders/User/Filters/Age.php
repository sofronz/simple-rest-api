<?php
namespace App\Builders\Subscriber\Filters;

use App\Interfaces\Builder\Filter;
use Illuminate\Database\Eloquent\Builder;

class Age implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public static function apply(Builder $builder, $value): Builder
    {
        return $builder->whereBetween('age', $value);
    }
}
