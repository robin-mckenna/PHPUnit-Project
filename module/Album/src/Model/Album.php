<?php

namespace Album\Model;

class Album
{
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
     * Title must begin with a capital letter
     *
     * @return bool
     */
    public function titleValid()
    {
        if (ctype_upper(substr($this->title, 0, 1))) {
            return true;
        }

        return false;
    }
}
