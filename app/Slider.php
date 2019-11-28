<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Slider extends Model
{
    protected $fillable = ['image'];

    public static function add($fields)
    {
        $slider = new static;
        $slider->fill($fields);
        $slider->save();

        return $slider;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null)
        {
            Storage::delete('/storage/uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {return;}

        $this->removeImage();
        $filename = Hash::make(Str::random(100)) . '.' . $image->extension();
        $image->storeAs('uploads', $filename, 'public');
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-image.png';
        }
        return '/storage/uploads/' . $this->image;
    }

    public static function getSliders()
    {
        return self::OrderBy('id', 'desc')->get();
    }

}
