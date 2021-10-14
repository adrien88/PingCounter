<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;

final class CollectionTest extends TestCase
{
    /**
     * test dummy collection
     */
    public function testDummyCollection(): void
    {
        $class = new DummyCollection;
        $this->assertInstanceOf('DummyCollection', $class);
    }

    /**
     * test stub collection
     */
    public function testStubCollection()
    {
        $collec = new StubCollection;
        // return null
        $this->assertNull($collec->set());
        // return a string
        $this->assertIsString($collec->get());
    }

    /**
     * test fake collection
     */
    public function testFakeCollection()
    {
        $collec = new FakeCollection;
        $object = new stdClass;
        // comment next line to do explode test
        $object->name = 'test';
        $this->assertIsBool($collec->set($object));
        $this->assertInstanceOf('stdClass', $collec->get('test'));
    }

    /**
     * test spyed collection
     */
    public function testSpyCollection()
    {
        $collec = new SpyCollection;
        $object = new stdClass;
        // comment next line to do explode test
        $object->name = 'test';
        $collec->set($object);
        $collec->get('test');
        $this->assertNotEmpty($collec->spy);
        // show spy
        // if (!empty($collec->spy)) var_dump($collec->spy);
    }

    /**
     * test mock collection
     */
    public function testMockCollection()
    {
        $collec = ($this->getMockBuilder(CollectionInterface::class))
            ->disableOriginalConstructor()
            ->getMock();
        $collec->method('set')->willReturn(true);
        $collec->method('get')->willReturn(new stdClass());
        // No no, there no errors one get() method... :) 
        $this->assertInstanceOf('stdClass', $collec->get('some'));
    }
}
