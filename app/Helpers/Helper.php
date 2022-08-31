<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Image;
use Illuminate\Http\Request;
 
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Helper{

    public static function getMenuOptions($select = '')
    {
        $data = Db::table('menus')->where('parent_id',0)->select('id','name')->get();
        if($data)
        foreach ($data as $row) {
            if($row->id == $select) $selected= "selected";
                else $selected ="";
            echo "<option value='".$row->id."' ".$selected.">".$row->name."</option>";
            $data2 = Db::table('menus')->where('parent_id',$row->id)->select('id','name')->get();
            foreach ($data2 as $row2) {
                if($row2->id == $select) $selected= "selected";
                else $selected ="";
                echo "<option value='".$row2->id."' ".$selected.">  &nbsp;&nbsp;--&nbsp;".$row2->name."</option>";
            }
        }
    }
    ######## FRONT END Helper ##########
    public static function getMenuRows($parent_id = 0)
    {
        return DB::table('menus')
                    ->orderBy('displayOrder','asc')
                    ->where(['display'=>'yes','parent_id'=>$parent_id])
                    ->get();  
    }

    public static function processImage($originalImage,$thumb_check = TRUE)
    {
        $uniqueKey = time(). '_' . uniqid();
        $rawImage = Image::make($originalImage);
        $abs_path = public_path('images');
        $thumb_path = public_path('images/category');

        $rawImage->save($abs_path.'/'.$uniqueKey.'.'.$originalImage->getClientOriginalExtension());
        if($thumb_check){
            // $rawImage->resize(150,150);
            $rawImage->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $rawImage->save($thumb_path.'/'.$uniqueKey.'.'.$originalImage->getClientOriginalExtension()); 
        }
        return  $uniqueKey.'.'.$originalImage->getClientOriginalExtension();
    }
    public static function unlinkImage($path,$image)
    {
        if($image == "") return true;
        $full_path = $path.'\\'.$image;
        $thumb_path = $path.'\\'.'category'.'\\'.$image;
        if (File::exists($full_path)) unlink($full_path);
        if (File::exists($thumb_path)) unlink($thumb_path);     
    }

    public static function getParentOptions($select = '')
    {
        $data = Db::table('categories')->where('parent_id',0)->select('id','name')->get();
        if($data)
        foreach ($data as $row) {
            if($row->id == $select) $selected= "selected";
                else $selected ="";
            echo "<option value='".$row->id."' ".$selected.">".$row->name."</option>";
            $data2 = Db::table('categories')->where('parent_id',$row->id)->select('id','name')->get();
            foreach ($data2 as $row2) {
                if($row2->id == $select) $selected= "selected";
                else $selected ="";
                echo "<option value='".$row2->id."' ".$selected.">  &nbsp;&nbsp;--&nbsp;".$row2->name."</option>";
            }
        }
    }

   public static function getEnumOptions( $options, $selected = ''){

        //print_r($options);
        //echo $selected;

        echo '<option value="">Select</option>';
        foreach ($options as $option):
            $select = ( $selected == $option) ? 'selected' : '';
            echo '<option value="'.$option.'" '.$select.'>'.$option.'</option>';
        endforeach;

    }

    public static function getOptions($tableName,$key='id',$val = 'name',$select = '',$cond = array(),$selectOption = FALSE)
    {
        if($cond)
            $data = Db::table($tableName)->where($cond)->get();
        else
            $data = Db::table($tableName)->get();
  
        if ($data)
        {
            if($selectOption) echo "<option value='' disabled selected>Select option</option>";
            foreach ($data as $row2)
            {
                if($row2->$key == $select) $selected= "selected";
                else $selected ="";
                echo "<option value='".$row2->$key."' ".$selected."-->".$row2->$val."</option>";
            }
        }
        else
            echo "<option value='0'>No Options</option>";

    }
    public static function countRows($tableName,$cond = array())
    {
        if ($cond)
            return Db::table($tableName)->where($cond)->count();
        else
            return Db::table($tableName)->count();
    }

    public static function cleanSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

     function presentPrice($price)
    {
        return number_format('$%i', $price / 100);
    }

    //  function setActiveCategory($category, $output = 'active')
    // {
    //     return request()->category == $category ? $output : '';
    // }
}