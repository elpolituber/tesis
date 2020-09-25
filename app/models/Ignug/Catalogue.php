<?php

namespace App\Models\Ignug;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Catalogue extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-ignug';
    protected $fillable = [
        'code',
        'parent_code_id',
        'name',
        'type',
        'icon'
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtolower($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = strtolower($value);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function applyFilters()
    {
        return function () {
            foreach (request('filter', []) as $filter => $value) {
                $scope = "scope" . ucfirst($filter);
                if (!method_exists($this->model, $scope)) {
                    abort(400, "The Filter '$filter' is not allowed");
                }
                $this->{$filter}($value);
            }
            return $this;
        };
    }

    public function scopeName($query, $value)
    {
        if ($value)
            return $query->where('name', 'LIKE', "%{$value}%");
    }

    public function children()
    {
        return $this->hasMany(Catalogue::class, 'parent_code_id');
    }

    public function parentCode()
    {
        return $this->belongsTo(Catalogue::class, 'parent_code_id');
    }
}