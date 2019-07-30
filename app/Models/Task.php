<?php
namespace App\Models;

class Task extends BaseUuid
{
    protected $table = 'tasks';
    
    protected $fillable = [
        'project_id', 'company_id', 'staff_id', 'partner_id', 'superior_id',  'accounting_id',  'name', 'content', 'started_at', 'ended_at','status', 
        'purchaseorder', 'invoice','budget','price', 'task', 'comment', 'inspection_date', 'fee_format', 
        'delivery_format', 'payment_terms', 'rating', 'rating_comment', 'remarks'
    ];
    public function project(){
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function taskCompanies()
    {
        return $this->hasMany('App\Models\TaskCompany', 'task_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\CompanyUser', 'staff_id', 'id');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partner_id', 'id');
    }

    public function superior()
    {
        return $this->belongsTo('App\Models\CompanyUser', 'superior_id', 'id');
    }

    public function accounting()
    {
        return $this->belongsTo('App\Models\CompanyUser', 'accounting_id', 'id');
    }

    public function taskPartners()
    {
        return $this->hasMany('App\Models\TaskPartner', 'task_id', 'id');
    }

    public function taskRoleRelation()
    {
        return $this->hasOne('App\Models\TaskRoleRelation', 'task_id', 'id');
    }

    public function purchaseOrder()
    {
        return $this->hasOne('App\Models\PurchaseOrder', 'task_id', 'id');
    }
    
    public function contract()
    {
        return $this->hasOne('App\Models\Contract', 'task_id', 'id');
    }

    public function nda()
    {
        return $this->hasOne('App\Models\Nda', 'task_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice', 'task_id', 'id');
    }
}
