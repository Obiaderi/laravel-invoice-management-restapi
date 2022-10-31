<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class InvoiceFilter extends ApiFilter
{
    protected $safeParams = [
        'customer_id' => ['eq'],
        'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'status' => ['eq', 'ne'],
        'billed_dated' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'paid_date' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDated' => 'billed_dated',
        'paidDate' => 'paid_date',
    ];

    protected $operatorsMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'ne' => '!=',
    ];
}