<?php

namespace Ortho\Laravel;

use Ortho\Laravel\Models\OrthoTransactionBuilder;

class Ortho
{

    // Build your next great package.
    private function  getConfig() {
        return config('ortho');
    }

    public function buildTransaction() {
        return new OrthoTransactionBuilder();
    }

    /**
     * @param array | OrthoTransactionBuilder $option
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function createTransaction($option)
    {
        $data = $option instanceof OrthoTransactionBuilder ? $option->getOptions() : $option;

        return "https://widget.tryortho.co?".http_build_query([
            'slug'=>config('ortho.slug'),
            'platform'=>'php',
            'props'=> $data,
        ],
            null,
                null,
                PHP_QUERY_RFC3986,
            );
    }
}
