<?php
namespace App\Builders\User;

use Illuminate\Http\Request;
use App\Interfaces\Builder\Query;
use App\Interfaces\UserInterface;
use App\Builders\Subscriber\Filters\Age;
use Illuminate\Database\Eloquent\Builder;
use App\Builders\Subscriber\Filters\Search;

class UserQuery implements Query
{
    /**
     * @param Request $request
     *
     * @return Builder
     */
    public static function apply(Request $request): Builder
    {
        $query = app(UserInterface::class)->listUsers();

        if ($request->has('search')) {
            $query = Search::apply($query, $request->get('search'));
        }

        if ($request->has(['age_min', 'age_max'])) {
            $query = Age::apply($query, [$request->get('age_min'), $request->get('age_max')]);
        }

        return $query;
    }
}
