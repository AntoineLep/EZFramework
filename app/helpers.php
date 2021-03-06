<?php

    /**
    * Get the path of a css file
    * @param (string) filename : Name of the file (with its extension)
    * @return (string) url to the file
    */
    function css_path($filename){
        return _path($filename, 'css');
    }

    /**
    * Get the path of a js file
    * @param (string) filename : Name of the file (with its extension)
    * @return (string) url to the file
    */
    function js_path($filename){
        return _path($filename, 'js');
    }

    /**
    * Get the path of an image
    * @param (string) filename : Name of the file (with its extension)
    * @return (string) url to the file
    */
    function img_path($filename){
        return _path($filename, 'img');
    }


    /**
    * Get the path of an asset file
    * @param (string) filename : Name of the file (with its extension)
    * @param (string) subpath : the subfolder of the concerned asset
    * @return (string) url to the file
    */
    function _path($filename, $subpath){
        $uri = str_replace(ROOT, '', ASSETS_FOLDER);
        $uri = str_replace('\\', '/', $uri);
        return '"' . BASE_URL . $uri . '/' . $subpath . '/' . $filename . '"';
    }
?>