<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscriber
 *
 * @property integer $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property integer $email
*/

class Subscriber extends Model {
    use HasFactory;

    protected $guarded = ['id'];
}
