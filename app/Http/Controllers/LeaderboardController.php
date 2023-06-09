<?php
/**
 *   Stake iGaming platform
 *   ----------------------
 *   LeaderboardController.php
 * 
 *   @copyright  Copyright (c) Casino, All rights reserved
 *   @author     Casino <info@casino.com>
 *   @see        https://casino.com
*/

namespace App\Http\Controllers;

use App\Helpers\Queries\LeaderboardQuery;

class LeaderboardController extends Controller
{
    public function index(LeaderboardQuery $query)
    {
        return [
            'count' => $query->getRowsCount(),
            'items' => $query->get()->makeHidden('email')
        ];
    }
}
