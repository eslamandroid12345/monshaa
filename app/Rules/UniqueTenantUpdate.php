<?php

namespace App\Rules;

use App\Models\Tenant;
use Illuminate\Contracts\Validation\Rule;

class UniqueTenantUpdate implements Rule
{
    protected $tenantId;
    protected $column;

    public function __construct($tenantId, $column)
    {
        $this->tenantId = $tenantId;
        $this->column = $column;
    }

    public function passes($attribute, $value): bool
    {
        return Tenant::query()
            ->where('id', '!=', $this->tenantId)
            ->where($this->column, $value)
            ->where('company_id','=',companyId())
            ->doesntExist();
    }

    public function message(): string
    {
        return $this->column == 'card_number' ? 'رقم بطاقه المستاجر موجوده من قبل' : 'رقم هاتف المستاجر موجود من قبل';
    }
}
