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
     * @group Title
     * @dataProvider titleDataProvider
     * @param $albumTitle
     */
    public function testTitleValid(Album $albumTitle)
    {
        $this->assertTrue($albumTitle->titleValid(), "The album title was: " . $albumTitle->title);
    }

    /**
     * True if album begins with a capital letter
     *
     * @group Title
     */
    public function testBeginsCaps()
    {
        $album = $this->newAlbum(null, null, 'Emotional wreckage', null);
        $this->assertTrue($album->beginsCaps(), "Album: " . $album->title);
    }

    /**
     * True if beginning character is not numeric
     *
     * @group Title
     */
    public function testBeginsAlpha()
    {
        $album = $this->newAlbum(null, null, 'Emotional wreckage', null);
        $this->assertTrue($album->beginsAlpha(), 'The album was: ' . $album->title);
    }

    /**
     * True if length is valid
     *
     * @group Title
     */
    public function testLengthValid()
    {
        $album = $this->newAlbum(null, null, 'Take Cover', null);
        $this->assertTrue($album->lengthValid(), 'The album was: ' . $album->title);
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

    /**
     * Provides only titles
     *
     * @return array
     */
    public function titleDataProvider()
    {
        return [
            [$this->newAlbum(null, null, "Bag of mysteries", null)],
            [$this->newAlbum(null, null, "the last straw", null)],
            [$this->newAlbum(null, null, "1, The drawing board", null)],
            [$this->newAlbum(null, null, "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", null)],
            [$this->newAlbum(null, null, "A", null)],
        ];
    }

    public function albumDataProvider()
    {
        return [
            [$this->newAlbum(1, 'artist1', "Bag of mysteries", date('YYYY-mm-dd'))],
            [$this->newAlbum(2, 'artist2', "the last straw", date('YYYY-mm-dd'))],
            [$this->newAlbum(3, 'artist3', "1, The drawing board", date('YYYY-mm-dd'))],
            [$this->newAlbum(4, 'artist4', "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", date('YYYY-mm-dd'))],
            [$this->newAlbum(5, 'artist5', "A", date('YYYY-mm-dd'))],
        ];
    }

    /**
     * Expects the album title to be uppercased
     * @group reflectionmock
     * @dataProvider titleDataProvider
     * @param Album $albumWithTitle
     * @throws ReflectionException
     */
    public function testTitleUppercase(Album $albumWithTitle)
    {
        $method = new ReflectionMethod('\Album\Model\Album', 'titleUpperCase');
        if ($method->isPrivate()) {
            $method->setAccessible(true);
        }

        $this->assertEquals(strtoupper($albumWithTitle->title), $method->invoke($albumWithTitle));
    }

    /**
     * @group mock
     */
    public function testFormat()
    {
       $mockAlbum = $this->getMockBuilder('\Album\Model\Album')->method()->getMock();

       $mockAlbum->will
    }
}
