<?php

/*
 * This file is part of the Force Login module for Magento2.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\ForceCustomerLogin\Test\Unit\Model;

use bitExpert\ForceCustomerLogin\Model\WhitelistEntrySearchResultInterfaceFactory;

/**
 * Class WhitelistEntrySearchResultInterfaceFactoryUnitTest
 * @package bitExpert\ForceCustomerLogin\Test\Unit\Model
 */
class WhitelistEntrySearchResultInterfaceFactoryUnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function createEntitySuccessfully()
    {
        $expectedEntity = $this->createMock('\bitExpert\ForceCustomerLogin\Api\Data\Collection\WhitelistEntrySearchResultInterface');

        $om = $this->getObjectManager();
        $om->expects($this->once())
            ->method('create')
            ->with(
                '\\bitExpert\\ForceCustomerLogin\\Api\\Data\\Collection\\WhitelistEntrySearchResultInterface',
                ['foo' => 'bar']
            )
            ->willReturn($expectedEntity);

        $factory = new WhitelistEntrySearchResultInterfaceFactory($om);

        $this->assertEquals($expectedEntity, $factory->create(['foo' => 'bar']));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Magento\Framework\ObjectManagerInterface
     */
    protected function getObjectManager()
    {
        return $this->createMock('\Magento\Framework\ObjectManagerInterface');
    }
}
