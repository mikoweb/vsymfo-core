<?php

/*
 * This file is part of the vSymfo package.
 *
 * website: www.vision-web.pl
 * (c) Rafał Mikołajun <rafal@vision-web.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace vSymfo\Core\Entity\Interfaces;

use vSymfo\Core\Entity\Provider\RendererProviderInterface;

/**
 * @author Rafał Mikołajun <rafal@vision-web.pl>
 * @package vSymfo Core
 * @subpackage Entity
 */
interface RendererProviderAwareInterface
{
    /**
     * @param RendererProviderInterface $rendererProvider
     */
    public function setRendererProvider(RendererProviderInterface $rendererProvider);
}
