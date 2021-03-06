<?php

/*
 * This file is part of the Force Login module for Magento2.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\ForceCustomerLogin\Test\Unit\Validator;

use bitExpert\ForceCustomerLogin\Validator\WhitelistEntry;

/**
 * Class WhitelistEntryUnitTest
 * @package bitExpert\ForceCustomerLogin\Test\Unit\Validator
 */
class WhitelistEntryUnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Label value is too short.
     */
    public function validationFailsDueToLabelTooShort()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('');

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Label value is too long.
     */
    public function validationFailsDueToLabelTooLong()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 256));

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Url Rule value is too short.
     */
    public function validationFailsDueToUrlRuleTooShort()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('');

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Url Rule value is too long.
     */
    public function validationFailsDueToUrlRuleTooLong()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('foo');
        $entity->expects($this->at(3))
            ->method('getUrlRule')
            ->willReturn(str_repeat('.', 256));

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Strategy value is too short.
     */
    public function validationFailsDueToStrategyTooShort()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('foo');
        $entity->expects($this->at(3))
            ->method('getUrlRule')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(4))
            ->method('getStrategy')
            ->willReturn('');

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Strategy value is too long.
     */
    public function validationFailsDueToStrategyTooLong()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('foo');
        $entity->expects($this->at(3))
            ->method('getUrlRule')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(4))
            ->method('getStrategy')
            ->willReturn('foo');
        $entity->expects($this->at(5))
            ->method('getStrategy')
            ->willReturn(str_repeat('.', 256));

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Editable is no boolean value.
     */
    public function validationFailsDueToEditableFalseType()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('foo');
        $entity->expects($this->at(3))
            ->method('getUrlRule')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(4))
            ->method('getStrategy')
            ->willReturn('foo');
        $entity->expects($this->at(5))
            ->method('getStrategy')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(6))
            ->method('getEditable')
            ->willReturn('foo');

        $validator = new WhitelistEntry();
        $validator->validate($entity);
    }

    /**
     * @test
     */
    public function validationSucceeds()
    {
        $entity = $this->getWhitelistEntry();
        $entity->expects($this->at(0))
            ->method('getLabel')
            ->willReturn('foo');
        $entity->expects($this->at(1))
            ->method('getLabel')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(2))
            ->method('getUrlRule')
            ->willReturn('foo');
        $entity->expects($this->at(3))
            ->method('getUrlRule')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(4))
            ->method('getStrategy')
            ->willReturn('foo');
        $entity->expects($this->at(5))
            ->method('getStrategy')
            ->willReturn(str_repeat('.', 255));
        $entity->expects($this->at(6))
            ->method('getEditable')
            ->willReturn(false);

        $validator = new WhitelistEntry();
        $this->assertTrue($validator->validate($entity));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\bitExpert\ForceCustomerLogin\Model\WhitelistEntry
     */
    private function getWhitelistEntry()
    {
        return $this->getMockBuilder('\bitExpert\ForceCustomerLogin\Model\WhitelistEntry')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
