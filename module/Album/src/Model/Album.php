<?php

namespace Album\Model;

class Album
{
    const titleLengthLimit = 300;

    public $id;
    public $artist;
    public $title;
    public $date_founded;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->artist = !empty($data['artist']) ? $data['artist'] : null;
        $this->title  = !empty($data['title']) ? $data['title'] : null;
        $this->date_founded = !empty($data['title']) ? $data['title'] : null;
    }

    /**
     * The date founded cannot be in the future
     *
     * @return bool
     */
    public function dateFoundedValid()
    {
        if ($this->date_founded < date('Y-m-d')) {
            return true;
        }

        return false;
    }

    /**
     * Returns true if the title is valid
     *
     * @return bool
     */
    public function titleValid()
    {
        return $this->beginsCaps() && $this->beginsAlpha() && $this->lengthValid();
    }

    /**
     * Title must begin with a capital letter
     *
     * @return bool
     */
    public function beginsCaps()
    {
        if (ctype_upper(substr($this->title, 0, 1))) {
            return true;
        }

        return false;
    }

    /**
     * returns true if title does not begin with a number
     *
     * @return bool
     */
    public function beginsAlpha()
    {
        return !is_numeric(substr(0, 1));
    }

    /**
     * Returns true if the length is <= the titleLengthLimit
     *
     * @return bool
     */
    public function lengthValid()
    {
        return !(strlen($this->title) > self::titleLengthLimit);
    }

    /**
     * Helper function to uppercase the title
     *
     * @return string
     */
    private function titleUpperCase()
    {
        return strtoupper($this->title);
    }

    public function format()
    {
        return sprintf('%d | Artist: $s, Title: %s, Date Founded: %s', $this->id, $this->artist, $this->title, $this->date_founded);
    }
}
