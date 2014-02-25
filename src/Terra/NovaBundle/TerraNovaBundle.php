<?php

namespace Terra\NovaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TerraNovaBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
