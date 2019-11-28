<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Card extends Model
{
    use Sluggable;

    protected $fillable = ['title','description','content'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();

        return $post;
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
