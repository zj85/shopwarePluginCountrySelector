<?php declare(strict_types=1);

namespace CountrySelector\Storefront\Controller;

use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"storefront"})
 */
class CountrySelectorController extends StorefrontController
{
    /**
     * @Route("/storefront/countrySelect", name="frontend.country.select", defaults={"csrf_protected"=false}, methods={"POST"})
     */
    public function setCountry(Request $request): JsonResponse
    {
        $country = $request->get('country');
        $response = new JsonResponse(true);
        $cookie = new Cookie(
            "shopwareCountrySelector", $country, strtotime("+1 year"),
            "/", null, false, false
        );

        $response->headers->setCookie($cookie);

        return $response;
    }
}
