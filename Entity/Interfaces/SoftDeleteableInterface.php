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

/**
 * @author Rafał Mikołajun <rafal@vision-web.pl>
 * @package vSymfo Core
 * @subpackage Entity
 */
interface SoftDeleteableInterface
{
    /**
     * @return \DateTime|null
     */
    public function getDeletedAt();

    /**
     * @param \DateTime|null $deletedAt
     */
    public function setDeletedAt(\DateTime $deletedAt = null);
}
