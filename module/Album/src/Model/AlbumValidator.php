<?php

namespace Album\Model;

class AlbumValidator
{
    /**
     * Returns true if all album fields are not null
     *
     * @param Album $album
     */
    public static function allFieldsSet(Album $album)
    {
        if ($album->id && $album->title && $album->artist && $album->date_founded) {
            return true;
        }

        return false;
    }

    public static function titleValid(Album $album)
    {
        return $album->titleValid();
    }

    public static function getTitle(Album $album)
    {
        return $album->getTitle();
    }
}