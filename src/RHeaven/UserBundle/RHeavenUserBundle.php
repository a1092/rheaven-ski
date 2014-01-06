<?php

namespace RHeaven\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RHeavenUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
