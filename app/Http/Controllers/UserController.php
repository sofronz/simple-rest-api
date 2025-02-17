<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Builders\User\UserQuery;
use App\Interfaces\UserInterface;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $users = UserQuery::apply($request)->paginate(10);

        return UserResource::collection($users);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     *
     * @return [type]
     */
    public function store(UserRequest $request)
    {
        $data = $request->fieldInputs();
        $user = app(UserInterface::class)->createUser($data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return UserResource
     */
    public function show(string $id)
    {
        $user = app(UserInterface::class)->findUser('id', $id);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param string $id
     *
     * @return UserResource
     */
    public function update(UserRequest $request, string $id)
    {
        $data = $request->fieldInputs();
        $user = app(UserInterface::class)->updateUser($data, $id);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        app(UserInterface::class)->deleteUser($id);

        return response()->json([
            'data' => [
                'message' => 'User Deleted!',
            ],
        ], 200);
    }
}
