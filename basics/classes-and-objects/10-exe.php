<?php

class Application
{
    private ?VideoStore $movieList = null;

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
                    echo "Bye!" . PHP_EOL;
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

    private function addMovies(): void
    {
        $title = readline("Title: ");
        $checkedOut = false;
        $rating = (int) readline("Rating (1-10): ");

        if ($this->movieList === null)
        {
            $this->movieList = new VideoStore([new Video($title, $checkedOut, [$rating])]);
        } else {
            $this->movieList->addMovie(new Video($title, $checkedOut, [$rating]));
        }
    }

    private function rentVideo(): void
    {
        $movieIndex = (int) readline("Movie index: ");
        $movie = $this->movieList->getMovieList()[$movieIndex];

        if ($movie->getCheckedOut() === false)
        {
            $movie->checkOutMovie();
            echo "You rented {$movie->getTitle()}" . PHP_EOL;
        } else {
            echo "Movie unavailable" . PHP_EOL;
        }
    }

    private function returnVideo(): void
    {
        $movieIndex = (int) readline("Movie index: ");
        $movie = $this->movieList->getMovieList()[$movieIndex];

        if ($movie->getCheckedOut() === true)
        {
            $addRating = (int) readline("Give rating for {$movie->getTitle()}: ");
            $movie->returnMovie();
            $movie->giveRating($addRating);
        } else {
            echo "Movie was not rented for you to return it!" . PHP_EOL;
        }
    }

    private function listInventory(): void
    {
        if ($this->movieList === null)
        {
            echo "There are no movies in the store! " . PHP_EOL;
            echo "----------------------------------" . PHP_EOL;
        } else {
            echo "-------------- AVAILABLE MOVIES --------------" . PHP_EOL;
            foreach ($this->movieList->getMovieList() as $index => $movie) {
                echo "[{$index}] | {$movie->getTitle()} | {$movie->getAvgRating()} | {$movie->stringCheckOut()}" . PHP_EOL;
            }
            echo "-------------- END OF LIST ----------------" . PHP_EOL;
        }
    }
}

class VideoStore
{
    private array $movieList;

    public function __construct(array $movieList)
    {
        foreach ($movieList as $movie) {
            $this->addMovie($movie);
        }
    }

    public function addMovie(Video $movie)
    {
        $this->movieList[] = $movie;
    }

    public function getMovieList(): array
    {
        return $this->movieList;
    }
}

class Video
{
    private string $title;
    private bool $checkedOut;
    private array $ratings;

    public function __construct(string $title, bool $checkedOut, array $ratings)
    {
        $this->title = $title;
        $this->checkedOut = $checkedOut;
        $this->ratings = $ratings;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCheckedOut(): bool
    {
        return $this->checkedOut;
    }

    public function checkOutMovie(): bool
    {
        return $this->checkedOut = true;
    }

    public function returnMovie(): bool
    {
        return $this->checkedOut = false;
    }

    public function giveRating(int $rating): void
    {
        $this->ratings[] = $rating;
    }

    public function getAvgRating(): int
    {
        if (!$this->ratings)
        {
            return 0;
        }
        return array_sum($this->ratings) / count($this->ratings);
    }

    public function stringCheckOut(): string
    {
        return ($this->checkedOut === false) ? "AVAILABLE" : "UNAVAILABLE";
    }
}

$app = new Application();
$app->run();