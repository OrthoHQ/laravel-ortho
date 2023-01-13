<?php

namespace Ortho\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ortho\Laravel\Skeleton\SkeletonClass
 */
class OrthoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ortho';
    }
}
