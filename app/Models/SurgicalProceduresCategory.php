<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurgicalProceduresCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sp_categories';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\SurgicalProceduresArticle', 'category_id');
    }
    public function getSelectedColumnsFromArticles()
    {
        return $this->hasMany('App\Models\SurgicalProceduresArticle', 'category_id')->select('id', 'category_id','name', 'slug');
    }
}