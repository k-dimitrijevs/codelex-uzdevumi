<?php

/**
 * Write a method named swap_points that accepts two Points as parameters and swaps their x/y values.
 *
 * Consider the following example code that calls swapPoints:
 *
 * $p1 = new Point(5, 2);
 * $p2 = new Point(-3, 6);
 * swapPoints(p1, p2);
 *
 * echo "(" . p1.x . ", " . p1.y . ")";
 * echo "(" . p2.x . ", " . p2.y . ")";
 *
 * The output produced from the above code should be:
 *
 * (-3, 6)
 * (5, 2)
 */

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }
    public function getY(): int
    {
        return $this->y;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }
    public function setY(int $y): void
    {
        $this->y = $y;
    }
}

function swapPoints(object $p1, object $p2)
{
    $newP1 = new Point($p2->getX(), $p2->getY());
    $newP2 = new Point($p1->getX(), $p1->getY());

    $first = "({$newP1->getX()}, {$newP1->getY()})" . PHP_EOL;
    $second = "({$newP2->getX()}, {$newP2->getY()})" . PHP_EOL;

    return $first . $second;

}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "({$p1->getX()}, {$p1->getY()})" . PHP_EOL;
echo "({$p2->getX()}, {$p2->getY()})" . PHP_EOL;

echo " SWAP " . PHP_EOL;
echo swapPoints($p1, $p2);
