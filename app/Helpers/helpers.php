<?php
if (! function_exists('getResizedImage')) {
    /**
     * @param $size
     *
     * @return null|string
     */
    function getResizedImage($image,$size)
    {
        $publicFile = null;

        if (isset($image)) {
            $filename = basename($image);

            if(config('edir.serve_images_via_aws')) {
                $publicFile = config('edir.aws_url') . str_replace($filename, $size . '/' . $filename, $image);
            } else {
                $storage_file = '/storage/' . str_replace($filename, $size . '/' . $filename, $image);
                if(file_exists($storage_file)){
                    $publicFile = $storage_file;
                }
            }

            if ($size == 'original') {
                return '/storage/' . $image;
            }
        }
        if($publicFile){
            return $publicFile;
        }
        else{
            return '/images/placeholder_'.$size.'.png';
        }

    }
}