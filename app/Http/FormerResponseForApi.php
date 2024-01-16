<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\JsonAndXmlFormatterForApi;

class FormerResponseForApi
{
    public function __construct(private JsonAndXmlFormatterForApi $jsonAndXmlFormatterForApi)
    {

    }

    public function responseForming($request, $dataForArray)
    {
        $coursesArray = $dataForArray->toArray();

        $format = $request->input('format', 'json');

        return $this->jsonAndXmlFormatterForApi->format($format, $coursesArray);
    }
}