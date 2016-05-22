<?php
/**
 * Created by PhpStorm.
 * User: qinxiang
 * Date: 16/5/21
 * Time: 下午6:47
 */

namespace App\Http\Transformer;

use App\Model\album_data;
use League\Fractal\TransformerAbstract;

Class AlbumTransformer extends TransformerAbstract{

    public function transform(album_data $datainfo){

        return [
            'date'=>$datainfo['date'],
            'text'=>$datainfo['text'],
            'img_url'=>$datainfo['img_url']
        ];
    }

}