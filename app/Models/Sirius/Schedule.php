<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Oct 2017 03:49:50 +0000.
 */

namespace App\Models\Sirius;

use Reliese\Database\Eloquent\Model as Eloquent;


class Schedule extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $table = 'horarios';


}
