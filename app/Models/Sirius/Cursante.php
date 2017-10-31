<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 31 Oct 2017 01:02:18 +0000.
 */

namespace App\Models\Sirius;

use Reliese\Database\Eloquent\Model as Eloquent;

class Cursante extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $table ="cursantes";
}
