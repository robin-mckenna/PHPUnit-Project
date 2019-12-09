<?php

use Album\Model\Album;
use PHPUnit\Framework\TestCase;

class AlbumTest extends TestCase
{
    /**
     * Expects the current date to be later than the founded album date
     */
    public function testDateFoundedValid()
    {
        // Create an album
        $dateFoundedTestAlbum = $this->newAlbum(
            '1',
            'Test Artist 1',
            'Test Title 1',
            '2018-08-08'
        );

        // The date founded property
        self::assertGreaterThan(
            $dateFoundedTestAlbum->date_founded,
            date('Y-m-d'),
            'Date founded: ' . $dateFoundedTestAlbum->date_founded . PHP_EOL . 'Current Date: ' . date('Y-m-d')
        );

        // The dateFoundedValid function works as expected
        self::assertTrue(
            $dateFoundedTestAlbum->dateFoundedValid(),
            'Date founded: ' . $dateFoundedTestAlbum->date_founded . PHP_EOL . 'Current Date: ' . date('Y-m-d')
        );
    }

    /**
     * Helper function to create an album to use in test cases
     *
     * @param $id
     * @param $artist
     * @param $title
     * @param $dateFounded
     * @return Album
     */
    private function newAlbum($id, $artist, $title, $dateFounded)
    {
        $album = new Album;

        $album->id = $id;
        $album->artist = $artist;
        $album->title = $title;
        $album->date_founded = $dateFounded;

        return $album;
    }
}
