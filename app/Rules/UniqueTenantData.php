<?php

namespace App\Rules;

use App\Models\Tenant;
use Illuminate\Contracts\Validation\Rule;

class UniqueTenantData implements Rule
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
        ->where($this->column, $value)
            ->where('company_id','=',companyId())
            ->where('id', '!=', $this->tenantId)
            ->doesntExist();
    }

    public function message(): string
    {
        return $this->column == 'card_number' ? 'رقم بطاقه المستاجر موجوده من قبل' : 'رقم هاتف المستاجر موجود من قبل';
    }
}
