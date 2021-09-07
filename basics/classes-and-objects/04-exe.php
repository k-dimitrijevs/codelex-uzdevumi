<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;
    
    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getStudio(): string
    {
        return $this->studio;
    }
    public function getRating(): string
    {
        return $this->rating;
    }
}

$movies = [
    $casinoRoyale = new Movie("Casino Royale", "Eon Productions", "PG13"),
    $glass = new Movie("Glass", "Buena Vista International", "PG13"),
    $spiderMan = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG"),
    $theGoonies = new Movie("The Goonies", "Amblin Entertainment", "PG")
];

function getPG(array $movies): array
{
    $onlyPG = [];
    foreach ($movies as $movie)
    {
        if ($movie->getRating() === "PG")
        {
            $onlyPG[] = "MOVIE: {$movie->getTitle()} | STUDIO: {$movie->getStudio()}" . PHP_EOL;
        }
    }
    return $onlyPG;
}

echo implode("", getPG($movies));