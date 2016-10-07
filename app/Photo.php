<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

/**
 * @property string path
 * @property string thumbnail_path
 */
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
        $photo->thumbnail_path = $photo->baseDir . '/tn-' . $name;

        $file->move($photo->baseDir, $name);

        Image::make($photo->path)
            ->fit(200)
            ->save($photo->thumbnail_path);

        return $photo;
    }


    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
}
