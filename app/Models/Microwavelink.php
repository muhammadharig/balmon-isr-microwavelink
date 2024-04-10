<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microwavelink extends Model
{
    use HasFactory;

    protected $fillable = [
        'curr_lic_num',
        'clnt_id',
        'appl_id',
        'clnt_name',
        'stn_name',
        'freq',
        'freq_pair',
        'erp_pwr_dbm',
        'bwidth',
        'bhp',
        'eq_mdl',
        'ant_mdl',
        'hgt_ant',
        'master_plzn_code',
        'stn_addr',
        'sid_long',
        'sid_lat',
        'city',
        'link_id',
        'stasiun_lawan',
        'masa_laku',
        'mon_query',
    ];

}
