<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function save_nodes($node, $type, $object_id, $seo_name, $status, $is_sitemap) {
        $node = new Nodes();
        $node->type = $type;
        $node->object_id = $object_id;
        $node->seo_name = $seo_name;
        $node->status = $status;
        $node->is_sitemap = $is_sitemap;
        $node->save();
    }

    public function save_lang($lang, $type,  $object_id, $lang_code, $name, $desc, $content,
    $seo_name, $tags, $meta_title, $meta_desc, $meta_keyword) {
        $lang = new Multi_languages();
        $lang->type = $type;
        $lang->object_id = $object_id;
        $lang->lang_code = $lang_code;
        $lang->name = $name;
        $lang->desc = $desc;
        $lang->content = $content;
        $lang->seo_name = $seo_name;
        $lang->tags = $tags;
        $lang->meta_title = $meta_title;
        $lang->meta_desc = $meta_desc;
        $lang->meta_keyword = $meta_keyword;
        $lang->save();
    }

    public function update_lang($object_id, $lang_code, $type, $name, $desc, $content,
    $seo_name, $tags, $meta_title, $meta_desc, $meta_keyword) {
        $data = array();
        $data['name'] = $name;
        $data['desc'] = $desc;
        $data['content'] = $content;
        $data['seo_name'] = $seo_name;
        $data['tags'] = $tags;
        $data['meta_title'] = $meta_title;
        $data['meta_desc'] = $meta_desc;
        $data['meta_keyword'] = $meta_keyword;
        Multi_languages::where('object_id', $object_id)->where('lang_code', $lang_code)
        ->where('type', $type)->update($data);
    }
}
