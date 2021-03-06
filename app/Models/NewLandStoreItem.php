<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewLandStoreItem extends Model
{
    protected $table = 'new_land_store_items';

    protected $fillable = [
        'store_id',
        'config_id',
        'jj_status',
        'img_status',
        'tj_status',
        'nl_mercId',
        'nl_stoe_id',
        'log_no',
        'check_flag',
        'check_qm',
        'nl_key',
        'trmNo',
    ];

}
