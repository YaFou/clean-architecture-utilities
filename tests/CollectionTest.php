<?php

namespace YaFou\CleanArchitectureUtilities\Tests;

use YaFou\CleanArchitectureUtilities\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testOffsetNotExists()
    {
        $this->assertFalse(isset($this->makeCollection()[-1]));
    }

    public function testOffsetExists()
    {
        $this->assertTrue(isset($this->makeCollection()[0]));
    }

    public function testOffsetGet()
    {
        $this->assertSame('value1', $this->makeCollection()[0]);
    }

    public function testOffsetSet()
    {
        $collection = $this->makeCollection();
        $collection[0] = 'value0';
        $this->assertSame('value0', $collection[0]);
    }

    public function testOffsetUnset()
    {
        $collection = $this->makeCollection();
        unset($collection[0]);
        $this->assertFalse(isset($collection[0]));
    }

    public function testIsIterable()
    {
        $this->assertIsIterable($this->makeCollection());
    }

    public function testCount()
    {
        $this->assertSame(5, count($this->makeCollection()));
    }

    public function testNotEmpty()
    {
        $this->assertFalse($this->makeCollection()->isEmpty());
    }

    public function testEmpty()
    {
        $this->assertTrue((new Collection())->isEmpty());
    }

    public function testFirst()
    {
        $this->assertSame('value1', $this->makeCollection()->first());
    }

    public function testLast()
    {
        $this->assertSame('value5', $this->makeCollection()->last());
    }

    public function testFilter()
    {
        $expectedIndex = 0;

        $collection = $this->makeCollection()->filter(function(string $value, int $index) use(&$expectedIndex) {
            $this->assertSame($expectedIndex, $index);
            $expectedIndex++;

            return !((int) $value[5] & 1);
        });

        $this->assertEquals(new Collection([1 => 'value2', 3 => 'value4']), $collection);
    }

    public function testToArray()
    {
        $this->assertSame(
            ['value1', 'value2', 'value3', 'value4', 'value5'],
            $this->makeCollection()->toArray()
        );
    }

    public function testNotContains()
    {
        $this->assertFalse($this->makeCollection()->contains('value0'));
    }

    public function testContains()
    {
        $this->assertTrue($this->makeCollection()->contains('value1'));
    }

    /**
     * @return Collection<string>
     */
    private function makeCollection(): Collection
    {
        return new Collection(['value1', 'value2', 'value3', 'value4', 'value5']);
    }
}
