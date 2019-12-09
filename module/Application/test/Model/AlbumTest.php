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
     * True if an albums title meets requirements
     *
     * @dataProvider titleDataProvider
     * @param $albumTitle
     */
    public function testTitleValid(Album $albumTitle)
    {
        $this->assertTrue($albumTitle->titleValid(), "The album title was: " . $albumTitle->title);
    }

    /**
     * Provides data for valid and invalid values
     *
     * @return array
     */
    public function titleDataProvider()
    {
        return [
            [$this->newAlbum(null, null, "Bag of mysteries", null)],
            [$this->newAlbum(null, null, "the last straw", null)],
            [$this->newAlbum(null, null, "1, The drawing board", null)],
            [$this->newAlbum(null, null, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", null)],
            [$this->newAlbum(null, null, "A", null)],
        ];
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
