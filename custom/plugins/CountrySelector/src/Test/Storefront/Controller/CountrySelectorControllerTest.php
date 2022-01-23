<?php declare(strict_types=1);

namespace CountrySelector\Storefront\Test;


use CountrySelector\Storefront\Controller\CountrySelectorController;
use PHPUnit\Framework\TestCase;

class CountrySelectorControllerTest extends TestCase
{
    public function testClassesAreInstantiable(): void
    {
        $request = $this->createMock("Symfony\Component\HttpFoundation\Request");
        $request->expects($this->once())
            ->method("get")
            ->with($this->equalTo("country"))
            ->will($this->returnValue("Germany"));

        $controller = new CountrySelectorController();
        $response = $controller->setCountry($request);
        $setCookie = $response->headers->getCookies()[0];

        $this->assertEquals("shopwareCountrySelector", $setCookie->getName());
        $this->assertEquals("Germany", $setCookie->getValue());
        $this->assertEquals(strtotime("+1 year"), $setCookie->getExpiresTime());
    }
}
