<?php

use Album\Model\Album;
use Album\Model\AlbumValidator;
use PHPUnit\Framework\TestCase;

class AlbumMockTest extends TestCase
{
    /**
     * Uses mock Album table object to find out if fields are set
     * @group mock
     */
    public function testFieldsSet()
    {
        $albumMock = $this->getMockBuilder(Album::class)
            ->getMock();

        $albumMock->id = 1;
        $albumMock->title = 'testtitle';
        $albumMock->artist = 'testartist';
        $albumMock->date_founded = date('Y:M:D h-m-s');

        $this->assertTrue(AlbumValidator::allFieldsSet($albumMock));
    }

    /**
     * Uses a mock object to determine if an album title is valid
     *
     * @group mock
     */
    public function testTitleValid()
    {
        $validTitle = "Test Title";

        $albumMock = $this->getMockBuilder(Album::class)
            ->setMethods(['titleValid'])
            ->getMock();

        $albumMock->method('titleValid')->willReturn($validTitle);

        $albumMock->id = 1;
        $albumMock->title = 'Test Title';
        $albumMock->artist = 'testartist';
        $albumMock->date_founded = date('Y:M:D h-m-s');

        $this->assertEquals($albumMock->title, AlbumValidator::titleValid($albumMock));
    }
}
