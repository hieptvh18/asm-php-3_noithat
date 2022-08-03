<?php


if (!function_exists('saveFile')) {
    function saveFile($file, $folder = 'public', $prefixName = '')
    {

        $fileName = uniqid() . '.' . $file->extension();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;

        return $file->storeAs($folder, $fileName);
    }
}

// get category tree
if(!function_exists('getChildCategories')){
    function getChildCategories(&$listData,$parentId=0,$level=0){
        // default truyen $parentId = null vi no la cap 0;
        // note $parentID = sub_categories_id
        $arr = array();
        foreach($listData as $key=>$val){

            // logic: find all parent -> find child of child ==> continue
            // level se la so cap bac de co the dung str_repeat lap
            $val['level'] = $level;
            if($val['parent_id'] == $parentId){
                $arr[] = $val;
            
                // callback
                $menuChild = getChildCategories($listData,$val['id'],$level+1);
                $arr = array_merge($arr,$menuChild);
            }
        }
        return $arr;
    }
}
