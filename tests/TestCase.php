<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    /**
     * comprueba si la respuesta tiene cabecera.
     *
     * @param $header
     * @return $this
     */
    public function seeHasHeader($header)
    {
        $this->assertTrue(
        $this->response->headers->has($header),
        "Response deberia de tener header ' { $header } ' pero no."
        );

        return $this;
    }

    /**
     * * Asserts that the response header matches a given regular expression
    *
    * @param $header
    * @param $regexp
    * @return $this
    */
    public function seeHeaderWithRegExp($header, $regexp)
    {
        $this
        ->seeHasHeader($header)
        ->assertMatchesRegularExpression(
            $regexp,
            $this->response->headers->get($header)
        );

        return $this;
    }
}
