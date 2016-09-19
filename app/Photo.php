<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';
    protected $fillable = ['path'];
    protected $baseDir = 'flyers/photos';

    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;

        // Give it a name
        $name = time() . $file->getClientOriginalName();

        $photo->path = $photo->baseDir .  '/' . $name;

        $file->move($photo->baseDir, $name);

        return $photo;
    }


    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
}
