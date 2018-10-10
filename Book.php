<?php
namespace Foobooks0;
class Book
{
    # Properties
    private $books;
    #private because we don't want anything to touch the book data we use. Using a public function getAll later
    #lets us grant programmers access to the data without being able to change the source data.
    # Methods
    public function __construct($json)
    {
        # Load book data
        $booksJson = file_get_contents($json);
        $this->books = json_decode($booksJson, true);
    }
    public function getAll()
    {
        return $this->books;
    }
    public function getByTitle(bool $caseSensitive, string $searchTerm)
    {
        $results = [];
        # Filter book data according to search term
        foreach ($this->books as $title => $book) {
            if ($caseSensitive) {
                $match = $title == $searchTerm;
            } else {
                $match = strtolower($title) == strtolower($searchTerm);
            }
            if ($match) {
                $results[$title] = $book;
            }
        }
        return $results;
    }
}