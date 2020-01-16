<?php

namespace common\components;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\base\Component;
use yii\base\ViewRenderer;
use yii\web\UploadedFile;

class Funcs extends Component
{
    public static function uniqstring($time = null)
    {
        if ($time == null) {
            $time = time() - 1560700000;
        }
        $num = range(0, 9);
        $string = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'K', 'Q', 'M');
        return str_replace($num, $string, $time);
    }

    public static function EnNumber($string)
    {
        $num = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $en = range(0, 9);
        return str_replace($num, $en, $string);
    }

    public static function Filter($array, $filterBy)
    {
        $new = array_filter($array, function ($var) use ($filterBy) {
            foreach ($filterBy as $key => $value) {
                if (!($var[$key] == $value)) {
                    return false;
                }
            }
            return true;
        });
        return array_values($new);
    }

    public static function DiscountClass($discount)
    {
        if ($discount < 6) {
            return 'blue-one';
        }
        if ($discount < 16) {
            return 'green-one';
        }
        if ($discount > 15) {
            return 'pink-one';
        }
        return '';
    }

    public static function Numbric($string)
    {
        if ((int)$string > 1000) {
            return number_format((int)$string);
        } else {
            return $string;
        }
    }


    public static function Imageupload($img, $name = null, $width = null, $height = null, $tw = 300, $th = 300, $stw = 100, $sth = 100)
    {

        if ($img) {
            $name = self::FileUpload($img, $name);
            if (!$name) {
                return false;
            }
            if ($width == null || $height == null) {
                list($width, $height) = getimagesize(self::ShowImage($name));

                if ($width > $height) {
                    if ($width > 800) {
                        $scale = 800 / $width;
                        $height = $scale * $height;
                        $width = 800;
                    }
                } else {
                    if ($height > 800) {
                        $scale = 800 / $height;
                        $width = $scale * $width;
                        $height = 800;
                    }
                }
            }

            Image::thumbnail(Yii::getAlias('@upload') . '/' . $name, $width, $height)
                ->resize(new Box($width, $height))
                ->save(Yii::getAlias('@upload') . '/' . $name,
                    ['quality' => 50]);
            Image::thumbnail(Yii::getAlias('@upload') . '/' . $name, $tw, $th)
                ->resize(new Box($tw, $th))
                ->save(Yii::getAlias('@upload') . '/thumbnail/' . $name,
                    ['quality' => 50]);
            Image::thumbnail(Yii::getAlias('@upload') . '/' . $name, $stw, $sth)
                ->resize(new Box($stw, $sth))
                ->save(Yii::getAlias('@upload') . '/smallthumbnail/' . $name,
                    ['quality' => 50]);
            return $name;
        }
        return false;
    }

    public static function FileUpload($file, $name)
    {
        if ($file) {
            if ($name != null) {
            } else {
                $name = $file->baseName;
            }
            $name = $name . '.' . $file->extension;
            if ($file->saveas(Yii::getAlias('@upload') . '/' . $name)) {
                return $name;
            }
        }
        return false;
    }

    public static function FileExist($name)
    {
        if (file_exists(\Yii::getAlias('@upload') . '/' . $name)) {
            return true;
        } else {
            return false;
        }
    }


    public static function ShowImage($image)
    {

        return Yii::$app->urlManager->hostInfo . '/upload/' . (strlen($image) > 3 && Funcs::FileExist($image) ? $image : 'noimage.jpg');

    }

    public static function ShowThumbImage($image)
    {
        $thumb = 'thumbnail/' . $image;
        return Yii::$app->urlManager->hostInfo . '/upload/' . (strlen($image) > 3 && Funcs::FileExist($thumb) ? $thumb : 'noimage.jpg');
    }

    public static function ShowSmallImage($image)
    {
        $thumb = 'smallthumbnail/' . $image;
        return Yii::$app->urlManager->hostInfo . '/upload/' . (strlen($image) > 3 && Funcs::FileExist($thumb) ? $thumb : 'noimage.jpg');
    }

    public static function delfilebyname($name)
    {
        if ($name) {
            if (self::FileExist($name)) {
                unlink(\Yii::getAlias('@upload' . '/' . $name));
            }
            if (self::FileExist('/smallthumbnail/' . $name)) {
                unlink(\Yii::getAlias('@upload' . '/' . 'smallthumbnail/' . $name));
            }
            if (self::FileExist('/thumbnail/' . $name)) {
                unlink(\Yii::getAlias('@upload' . '/' . 'thumbnail/' . $name));
            }
        }
    }

    public static function modelerrors($model)
    {
        $errors = $model->errors;
        $string = '';
        foreach ($errors as $error) {
            foreach ($error as $r) {
                $string .= $r . '/';
            }
        }
        return $string;
    }

}

