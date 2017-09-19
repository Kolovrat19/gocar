<?php

/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 11:48
 */
namespace App\Support\Images;

use App\Support\Images\Manager as Images;

trait Uploadable
{
    /**
     * Set the image value of a given model.
     *
     * @param  array  $attr
     *
     * @return null|String
     */
    public function setPicturesAttribute(array $attr)
    {
        $current = $this->image;
        $image = Images::parse($attr)->on($this->storageFolder());

        if ($image->wantsDeletion()) {
            $image->delete($current);
            return $this->attributes['image'] = null;
        }

        $picture = $image->update($current);

        return $this->attributes['image'] = $picture['path'];
    }

    /**
     * Define the storage folder for a given model image.
     *
     * @return string
     */
    abstract protected function storageFolder() : string;
}