<?php

namespace App\Services\Companies;

use App\Services\BaseService;
use App\Models\Companies\Company;

class CompanyService extends BaseService
{

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }
}
