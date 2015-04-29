<?php

class UploadTags {

    public static $deleted = 0;
    public static $available = 1;

}

class Upload_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('rb');
    }

    public function insert($mobile_id, $data) {
        $mobile = R::load('mobile', $mobile_id);

        $entry = R::dispense('uploads');
        $entry->thumbnail_filename = $data['thumbnail_file_name'];
        $entry->normal_filename = $data['normal_file_name'];
        $entry->large_filename = $data['large_file_name'];

        $mobile->ownUploadsList[] = $entry;

        R::store($mobile);
    }

    public function get_all_uploads($mobile_id) {
        $mobile = R::load('mobile', $mobile_id);
        return $mobile->ownUploadsList;
    }
    public function get_single_upload($imageset_id){
        $images = R::load('uploads', $imageset_id);
        return $images;
    }

    public function delete($imageset_id,$basepath) {
       $images = R::load('uploads', $imageset_id);
       //echo $basepath.'/'.$images->thumbnail_filename;
       unlink($basepath.'/'.$images->thumbnail_filename);
       unlink($basepath.'/'.$images->normal_filename);
       unlink($basepath.'/'.$images->large_filename);
       R::trash($images);
    }

}
