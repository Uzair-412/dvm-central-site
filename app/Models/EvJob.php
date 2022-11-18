<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvJob extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ev_jobs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $guarded = [];

    public static $categories = ['1' => 'Sales Associate', '2' => 'Vet Technician', '3' => 'Veterinarian', '4' => 'Practice Manager'];
}
