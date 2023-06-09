<?php
/**
 *   Stake iGaming platform
 *   ----------------------
 *   PeriodScope.php
 * 
 *   @copyright  Copyright (c) Casino, All rights reserved
 *   @author     Casino <info@casino.com>
 *   @see        https://casino.com
*/

namespace App\Models\Scopes;

use App\Helpers\Utils;
use Illuminate\Database\Eloquent\Builder;

trait PeriodScope
{
    public function getScopePeriodColumnName()
    {
        return 'created_at';
    }

    public function scopePeriod(Builder $query, ?string $period, string $table = NULL): Builder
    {
        $column = ($table ?: $this->getTable()) . '.' . $this->getScopePeriodColumnName();

        return $query->when($period, function (Builder $query, ?string $period) use ($column) {
            $query->whereBetween($column, Utils::getDateRange($period));
        });
    }
}
