<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class About extends Model
{
    protected $fillable = ['text'];

    public static function add($fields)
    {
        $about = new static;
        $about->fill($fields);
        $about->save();

        return $about;

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
}
