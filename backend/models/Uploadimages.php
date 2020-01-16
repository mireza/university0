<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
class Uploadimages extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
   

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 10],
           
        ];
    }

    public function upload()
    {
        $id=null;
        if($this->imageFiles!=null){
            if ($this->validate()) {
                $i=0;
                foreach ($this->imageFiles as $file) {
                    $gallery=new  Product;
                    $newname=time().rand(0,1000).$i.'product'. '.' . $file->extension;
                    $file->saveAs(Yii::getAlias('@upload').'/'. $newname);
                    $gallery->img=$newname;
                    $gallery->save();
                    $i++;
                }
                return $id;
            } else {
                return $id;
            }
        }else{
            return $id;
        }

    }
}