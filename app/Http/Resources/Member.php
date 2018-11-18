<?php
/**
 * Created by IntelliJ IDEA.
 * User: Zteng
 * Date: 2018/11/18
 * Time: 21:49
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class Member extends Resource
{

    public function toArray($request): array
    {
        return [
            'uid' => $this->uid,
            'nickname' => $this->nickname,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'score' => $this->score,
            'status' => $this->status
        ];
    }
}