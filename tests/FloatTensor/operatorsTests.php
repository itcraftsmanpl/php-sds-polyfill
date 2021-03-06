<?php
declare(strict_types=1);


namespace SDS\Tests\FloatTensor;


use SDS\FloatTensor;

use PHPUnit\Framework\TestCase;


class operatorsTests extends TestCase
{
    /**
     * @covers \SDS\FloatTensor::neg
     */
    public function test_neg()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t2 = $t1->neg();

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(-1, $t2[[0, 0]]);
        $this->assertEquals(-2, $t2[[0, 1]]);
        $this->assertEquals(-3, $t2[[0, 2]]);
        $this->assertEquals(-4, $t2[[1, 0]]);
        $this->assertEquals(-5, $t2[[1, 1]]);
        $this->assertEquals(-6, $t2[[1, 2]]);
        $this->assertEquals(-7, $t2[[2, 0]]);
        $this->assertEquals(-8, $t2[[2, 1]]);
        $this->assertEquals(-9, $t2[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::neg
     */
    public function test_neg_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t1->neg(true);

        $this->assertEquals(-1, $t1[[0, 0]]);
        $this->assertEquals(-2, $t1[[0, 1]]);
        $this->assertEquals(-3, $t1[[0, 2]]);
        $this->assertEquals(-4, $t1[[1, 0]]);
        $this->assertEquals(-5, $t1[[1, 1]]);
        $this->assertEquals(-6, $t1[[1, 2]]);
        $this->assertEquals(-7, $t1[[2, 0]]);
        $this->assertEquals(-8, $t1[[2, 1]]);
        $this->assertEquals(-9, $t1[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::add
     */
    public function test_add()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t3 = $t1->add($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);

        $this->assertEquals(2, $t3[[0, 0]]);
        $this->assertEquals(4, $t3[[0, 1]]);
        $this->assertEquals(6, $t3[[0, 2]]);
        $this->assertEquals(8, $t3[[1, 0]]);
        $this->assertEquals(10, $t3[[1, 1]]);
        $this->assertEquals(12, $t3[[1, 2]]);
        $this->assertEquals(14, $t3[[2, 0]]);
        $this->assertEquals(16, $t3[[2, 1]]);
        $this->assertEquals(18, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::add
     */
    public function test_add_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t1->add($t2, true);

        $this->assertEquals(2, $t1[[0, 0]]);
        $this->assertEquals(4, $t1[[0, 1]]);
        $this->assertEquals(6, $t1[[0, 2]]);
        $this->assertEquals(8, $t1[[1, 0]]);
        $this->assertEquals(10, $t1[[1, 1]]);
        $this->assertEquals(12, $t1[[1, 2]]);
        $this->assertEquals(14, $t1[[2, 0]]);
        $this->assertEquals(16, $t1[[2, 1]]);
        $this->assertEquals(18, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::sub
     */
    public function test_sub()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [9, 8, 7],
            [6, 5, 4],
            [3, 2, 1]
        ]);

        $t3 = $t1->sub($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(9, $t2[[0, 0]]);
        $this->assertEquals(8, $t2[[0, 1]]);
        $this->assertEquals(7, $t2[[0, 2]]);
        $this->assertEquals(6, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(4, $t2[[1, 2]]);
        $this->assertEquals(3, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(1, $t2[[2, 2]]);

        $this->assertEquals(-8, $t3[[0, 0]]);
        $this->assertEquals(-6, $t3[[0, 1]]);
        $this->assertEquals(-4, $t3[[0, 2]]);
        $this->assertEquals(-2, $t3[[1, 0]]);
        $this->assertEquals(0, $t3[[1, 1]]);
        $this->assertEquals(2, $t3[[1, 2]]);
        $this->assertEquals(4, $t3[[2, 0]]);
        $this->assertEquals(6, $t3[[2, 1]]);
        $this->assertEquals(8, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::sub
     */
    public function test_sub_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [9, 8, 7],
            [6, 5, 4],
            [3, 2, 1]
        ]);

        $t1->sub($t2, true);

        $this->assertEquals(-8, $t1[[0, 0]]);
        $this->assertEquals(-6, $t1[[0, 1]]);
        $this->assertEquals(-4, $t1[[0, 2]]);
        $this->assertEquals(-2, $t1[[1, 0]]);
        $this->assertEquals(0, $t1[[1, 1]]);
        $this->assertEquals(2, $t1[[1, 2]]);
        $this->assertEquals(4, $t1[[2, 0]]);
        $this->assertEquals(6, $t1[[2, 1]]);
        $this->assertEquals(8, $t1[[2, 2]]);

        $this->assertEquals(9, $t2[[0, 0]]);
        $this->assertEquals(8, $t2[[0, 1]]);
        $this->assertEquals(7, $t2[[0, 2]]);
        $this->assertEquals(6, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(4, $t2[[1, 2]]);
        $this->assertEquals(3, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(1, $t2[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::mul
     */
    public function test_mul()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t3 = $t1->mul($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);

        $this->assertEquals(1, $t3[[0, 0]]);
        $this->assertEquals(4, $t3[[0, 1]]);
        $this->assertEquals(9, $t3[[0, 2]]);
        $this->assertEquals(16, $t3[[1, 0]]);
        $this->assertEquals(25, $t3[[1, 1]]);
        $this->assertEquals(36, $t3[[1, 2]]);
        $this->assertEquals(49, $t3[[2, 0]]);
        $this->assertEquals(64, $t3[[2, 1]]);
        $this->assertEquals(81, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::mul
     */
    public function test_mul_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t1->mul($t2, true);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(4, $t1[[0, 1]]);
        $this->assertEquals(9, $t1[[0, 2]]);
        $this->assertEquals(16, $t1[[1, 0]]);
        $this->assertEquals(25, $t1[[1, 1]]);
        $this->assertEquals(36, $t1[[1, 2]]);
        $this->assertEquals(49, $t1[[2, 0]]);
        $this->assertEquals(64, $t1[[2, 1]]);
        $this->assertEquals(81, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::div
     */
    public function test_div()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t3 = $t1->div($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);

        $this->assertEquals(1, $t3[[0, 0]]);
        $this->assertEquals(1, $t3[[0, 1]]);
        $this->assertEquals(1, $t3[[0, 2]]);
        $this->assertEquals(1, $t3[[1, 0]]);
        $this->assertEquals(1, $t3[[1, 1]]);
        $this->assertEquals(1, $t3[[1, 2]]);
        $this->assertEquals(1, $t3[[2, 0]]);
        $this->assertEquals(1, $t3[[2, 1]]);
        $this->assertEquals(1, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::div
     */
    public function test_div_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);

        $t1->div($t2, true);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(1, $t1[[0, 1]]);
        $this->assertEquals(1, $t1[[0, 2]]);
        $this->assertEquals(1, $t1[[1, 0]]);
        $this->assertEquals(1, $t1[[1, 1]]);
        $this->assertEquals(1, $t1[[1, 2]]);
        $this->assertEquals(1, $t1[[2, 0]]);
        $this->assertEquals(1, $t1[[2, 1]]);
        $this->assertEquals(1, $t1[[2, 2]]);

        $this->assertEquals(1, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(3, $t2[[0, 2]]);
        $this->assertEquals(4, $t2[[1, 0]]);
        $this->assertEquals(5, $t2[[1, 1]]);
        $this->assertEquals(6, $t2[[1, 2]]);
        $this->assertEquals(7, $t2[[2, 0]]);
        $this->assertEquals(8, $t2[[2, 1]]);
        $this->assertEquals(9, $t2[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::mod
     */
    public function test_mod()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::constant(2, [3, 3]);

        $t3 = $t1->mod($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(2, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(2, $t2[[0, 2]]);
        $this->assertEquals(2, $t2[[1, 0]]);
        $this->assertEquals(2, $t2[[1, 1]]);
        $this->assertEquals(2, $t2[[1, 2]]);
        $this->assertEquals(2, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(2, $t2[[2, 2]]);

        $this->assertEquals(1, $t3[[0, 0]]);
        $this->assertEquals(0, $t3[[0, 1]]);
        $this->assertEquals(1, $t3[[0, 2]]);
        $this->assertEquals(0, $t3[[1, 0]]);
        $this->assertEquals(1, $t3[[1, 1]]);
        $this->assertEquals(0, $t3[[1, 2]]);
        $this->assertEquals(1, $t3[[2, 0]]);
        $this->assertEquals(0, $t3[[2, 1]]);
        $this->assertEquals(1, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::mod
     */
    public function test_mod_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::constant(2, [3, 3]);

        $t1->mod($t2, true);

        $this->assertEquals(2, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(2, $t2[[0, 2]]);
        $this->assertEquals(2, $t2[[1, 0]]);
        $this->assertEquals(2, $t2[[1, 1]]);
        $this->assertEquals(2, $t2[[1, 2]]);
        $this->assertEquals(2, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(2, $t2[[2, 2]]);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(0, $t1[[0, 1]]);
        $this->assertEquals(1, $t1[[0, 2]]);
        $this->assertEquals(0, $t1[[1, 0]]);
        $this->assertEquals(1, $t1[[1, 1]]);
        $this->assertEquals(0, $t1[[1, 2]]);
        $this->assertEquals(1, $t1[[2, 0]]);
        $this->assertEquals(0, $t1[[2, 1]]);
        $this->assertEquals(1, $t1[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::pow
     */
    public function test_pow()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::constant(2, [3, 3]);

        $t3 = $t1->pow($t2);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(2, $t1[[0, 1]]);
        $this->assertEquals(3, $t1[[0, 2]]);
        $this->assertEquals(4, $t1[[1, 0]]);
        $this->assertEquals(5, $t1[[1, 1]]);
        $this->assertEquals(6, $t1[[1, 2]]);
        $this->assertEquals(7, $t1[[2, 0]]);
        $this->assertEquals(8, $t1[[2, 1]]);
        $this->assertEquals(9, $t1[[2, 2]]);

        $this->assertEquals(2, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(2, $t2[[0, 2]]);
        $this->assertEquals(2, $t2[[1, 0]]);
        $this->assertEquals(2, $t2[[1, 1]]);
        $this->assertEquals(2, $t2[[1, 2]]);
        $this->assertEquals(2, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(2, $t2[[2, 2]]);

        $this->assertEquals(1, $t3[[0, 0]]);
        $this->assertEquals(4, $t3[[0, 1]]);
        $this->assertEquals(9, $t3[[0, 2]]);
        $this->assertEquals(16, $t3[[1, 0]]);
        $this->assertEquals(25, $t3[[1, 1]]);
        $this->assertEquals(36, $t3[[1, 2]]);
        $this->assertEquals(49, $t3[[2, 0]]);
        $this->assertEquals(64, $t3[[2, 1]]);
        $this->assertEquals(81, $t3[[2, 2]]);
    }

    /**
     * @covers \SDS\FloatTensor::pow
     */
    public function test_pow_inPlace()
    {
        $t1 = FloatTensor::fromArray([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ]);
        $t2 = FloatTensor::constant(2, [3, 3]);

        $t1->pow($t2, true);

        $this->assertEquals(2, $t2[[0, 0]]);
        $this->assertEquals(2, $t2[[0, 1]]);
        $this->assertEquals(2, $t2[[0, 2]]);
        $this->assertEquals(2, $t2[[1, 0]]);
        $this->assertEquals(2, $t2[[1, 1]]);
        $this->assertEquals(2, $t2[[1, 2]]);
        $this->assertEquals(2, $t2[[2, 0]]);
        $this->assertEquals(2, $t2[[2, 1]]);
        $this->assertEquals(2, $t2[[2, 2]]);

        $this->assertEquals(1, $t1[[0, 0]]);
        $this->assertEquals(4, $t1[[0, 1]]);
        $this->assertEquals(9, $t1[[0, 2]]);
        $this->assertEquals(16, $t1[[1, 0]]);
        $this->assertEquals(25, $t1[[1, 1]]);
        $this->assertEquals(36, $t1[[1, 2]]);
        $this->assertEquals(49, $t1[[2, 0]]);
        $this->assertEquals(64, $t1[[2, 1]]);
        $this->assertEquals(81, $t1[[2, 2]]);
    }
}
