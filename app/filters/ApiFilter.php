<?php 

namespace App\Filters;

use Illuminate\Http\Request;


class ApiFilter
{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorsMap = [];

    public function transform (Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $params => $operators) {
            
            $query = $request->query($params);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$params] ?? $params;

            foreach ($operators as $operator) {
                
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorsMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}