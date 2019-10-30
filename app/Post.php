<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title','content', 'date','description'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,
            'posts_tags',
            'post_id',
            'tag_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @param $fields
     * @return Post
     */
    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
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
            Storage::delete('uploads/' . $this->image);
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
            return '/img/no-img.png';
        }
        return '/storage/uploads/' . $this->image;
    }

    public function setCategory($id)
    {
        if ($this->id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {return;}
        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = 0;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = 1;
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

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function toggleFeatured()
    {
        if ($this->is_featured = 0)
        {
            return $this->setFeatured();
        }
        return $this->setStandart();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y/m/d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null) ? $this->category->title : 'Нет категории';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty()) ? implode(',', $this->tags()->pluck('title')->all()) : 'Нет тегов';
    }

    public function getCategoryID()
    {
        return ($this->category != null) ? $this->category->id : null;
    }

    public function hasCategory()
    {
        return ($this->category != null) ? true : false;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id','>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public static function getPopularPosts()
    {
        return self::OrderBy('views', 'desc')->take(3)->get();
    }

    public static function getFeaturedPosts()
    {
        return self::where('is_featured', 1)->take(3)->get();
    }

    public static function getRecentPosts()
    {
        return self::OrderBy('date', 'desc')->take(4)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
