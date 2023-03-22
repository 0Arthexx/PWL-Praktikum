<?php

namespace entity;

class Book
{
    private string $isn;
    private string $title;
    private string $author;
    private string $publisher;
    private int $year;
    private string $description;
    private string $cover;
    private Genre $genre;

    /**
     * @return string
     */
    public function getIsn(): string
    {
        return $this->isn;
    }

    /**
     * @param string $isn
     */
    public function setIsn(string $isn): void
    {
        $this->isn = $isn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     */
    public function setGenre(Genre $genre): void
    {
        $this->genre = $genre;
    }

}

