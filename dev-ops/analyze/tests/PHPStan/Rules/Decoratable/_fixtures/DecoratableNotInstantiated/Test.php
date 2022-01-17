<?php declare(strict_types=1);

namespace Shopware\Development\Analyze\Test\PHPStan\Rules\Decoratable\_fixtures\DecoratableNotInstantiated;

class Test
{
    public function test(): void
    {
        $decoratable = new DecoratableClass();
        $notTagged = new NotTaggedClass();
    }
}
