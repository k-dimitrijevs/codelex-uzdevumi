<?php

class Application
{
    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies()
    {
        //todo
    }

    private function rentVideo()
    {
        //todo
    }

    private function returnVideo()
    {
        //todo
    }

    private function listInventory()
    {
        //todo
    }
}

class VideoStore
{
    private array $allMovies = [];

    public function __construct(Video $movie)
    {
        $this->allMovies[] = $movie;
    }

    public function getAllMovies(): array
    {
        return $this->allMovies;
    }

    public function addNewVideo(string $title): void
    {
        $this->allMovies[] = new Video($title, false);
    }

    public function checkOut(string $title): void
    {
        foreach ($this->allMovies as $movie)
        {
            if ($movie->getTitle() === $title && $movie->getCheckedOut() === true)
            {
                echo "This movie is already taken!" . PHP_EOL;
            } elseif ($title === $movie->getTitle()) {
                $movie->checkOutMovie();
            }
        }
    }

    public function returnVideo(string $title): void
    {
        foreach ($this->allMovies as $movie)
        {
            if ($movie->getTitle() === $title && $movie->getCheckedOut() === true)
            {
                echo "This movie is already in store!" . PHP_EOL;
            } elseif ($title === $movie->getTitle()) {
                $movie->returnVideo();
            }
        }
    }
}

class Video
{
    private string $title;
    private bool $checkedOut;
    private array $avgRatings = [];

    public function __construct(string $title, bool $checkedOut)
    {
        $this->title = $title;
        $this->checkedOut = $checkedOut;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCheckedOut(): bool
    {
        return $this->checkedOut;
    }

    public function checkOutMovie(): bool
    {
        return $this->checkedOut = true;
    }

    public function returnVideo(): bool
    {
        return $this->checkedOut = false;
    }

    public function giveRating(int $rating): void
    {
        $this->avgRatings[] = $rating;
    }

    public function getAvgRating(): int
    {
        if (!$this->avgRatings)
        {
            return 0;
        }
        return array_sum($this->avgRatings) / count($this->avgRatings);
    }
}

$app = new Application();
$app->run();