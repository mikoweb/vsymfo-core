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

namespace vSymfo\Core\Manager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use vSymfo\Core\Entity\EntityFactoryInterface;

/**
 * @author Rafał Mikołajun <rafal@vision-web.pl>
 * @package vSymfo Core
 * @subpackage Manager
 */
abstract class ControllerManagerAbstract implements ControllerManagerInterface
{
    /**
     * @var EntityManager
     */
    protected $manager;

    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var EntityFactoryInterface
     */
    protected $entityFactory;

    /**
     * @param EntityManager $manager
     * @param FormFactory $formFactory
     * @param EntityFactoryInterface $entityFactory
     */
    public function __construct(
        EntityManager $manager, 
        FormFactory $formFactory,
        EntityFactoryInterface $entityFactory
    ) {
        $this->manager = $manager;
        $this->formFactory = $formFactory;
        $this->entityFactory = $entityFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function createEntity(array $args = [])
    {
        return $this->entityFactory->entity($this->getEntityClass(), $args);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm($data = null, array $options = [])
    {
        $form = $this->formFactory
            ->createBuilder($this->formType(), $data, $options)
            ->getForm()
        ;

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function save($data)
    {
        $this->invalidEntityException($data);
        $this->manager->persist($data);
        $this->manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($data)
    {
        $this->invalidEntityException($data);
        $this->manager->remove($data);
        $this->manager->flush();
    }

    /**
     * @param mixed $data
     *
     * @throws \UnexpectedValueException
     */
    protected function invalidEntityException($data)
    {
        if (!$this->isRightEntity($data)) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @return mixed
     */
    abstract protected function formType();
}
