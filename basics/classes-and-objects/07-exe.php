<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother = null;
    private ?string $father = null;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setMother(string $mother): void
    {
        $this->mother = $mother;
    }
    public function setFather(string $father): void
    {
        $this->father = $father;
    }

    public function getMother(): string
    {
        return ($this->mother === null) ? "Unknown" : $this->mother;
    }
    public function getFather(): string
    {
        return ($this->father === null) ? "Unknown" : $this->father;
    }

    public function hasSameMotherAs(string $doge): bool {
        if ($this->mother === $doge)
        {
            return True;
        } else {
            return False;
        }
    }
}

class DogTest
{
    // main method
    public function createDogs(): string
    {
        $max = new Dog("Max", "male");
        $rocky = new Dog("Rocky", "male");
        $sparky = new Dog("Sparky", "male");
        $buster = new Dog("Buster", "male");
        $sam = new Dog("Sam", "male");
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $coco = new Dog("Coco", "female");

        $max->setMother("Lady");
        $max->setFather("Rocky");

        $coco->setMother("Molly");
        $coco->setFather("Buster");

        $rocky->setMother("Molly");
        $rocky->setFather("Sam");

        $buster->setMother("Lady");
        $buster->setFather("Sparky");

        if ($coco->hasSameMotherAs($rocky->getMother()) === true) {
            $msg = "Coco has the same mother as Rocky" . PHP_EOL;
        } else {
            $msg = "Coco does not have the same mother as Rocky" . PHP_EOL;
        }


        return "Coco's father: {$coco->getFather()}  |  Sparky's father: {$sparky->getFather()} | Coco & Rocky: {$msg}" . PHP_EOL;
    }
}

$doges = new DogTest();
echo $doges->createDogs();
