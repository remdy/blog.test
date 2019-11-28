<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    use Sluggable;

    protected $fillable = ['title', 'description', 'video'];

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
        $product = new static;
        $product->fill($fields);
        $product->save();

        return $product;
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


    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status == 0)
        {
            return $this->setPublic();
        }
        return $this->setDraft();
    }
}
