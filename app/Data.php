<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model{
    protected $table = 'playsms_tblSMSOutgoing';

    protected $fillable = ['c_timestamp', 'flag_deleted', 'uid', 'p_gateway', 'p_smsc', 'p_src', 'p_dst', 'p_footer', 'p_msg', 'p_datetime', 'p_update', 'p_status'];
}

