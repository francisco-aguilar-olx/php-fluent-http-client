<?php

namespace OLX\FluentHttpClient\Response\Assertion;

use OLX\FluentHttpClient\Response\ResponseHolder;
use OLX\FluentHttpClient\Exception\UnexpectedValueException;

class HeaderAssertion implements ResponseAssertionInterface
{
    /**
     * @var string
     */
    private $expectedHeaderName;

    /**
     * HeaderAssertion constructor.
     * @param $expectedHeaderName
     */
    public function __construct($expectedHeaderName)
    {
        $this->expectedHeaderName = $expectedHeaderName;
    }

    /**
     * @param ResponseHolder $response
     * @return bool
     * @throws UnexpectedValueException
     */
    public function assert(ResponseHolder $response)
    {
        if ($response->getHeader($this->expectedHeaderName) === false) {
            $message = sprintf('Header [%s] is not defined', $this->expectedHeaderName);
            throw new UnexpectedValueException($message);
        }
        return true;
    }
}
