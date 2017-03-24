<?php

namespace Tests\Feature\Control\Browser\User;

use App\Models\User;
use Tests\TestCase;

class SearchUserAdminTest extends TestCase
{

    /**
     * @test
     */
    public function testMustCheckIfThereIsAdministratorUserInSearch()
    {

        $user = User::where('email', 'administrador@vialoja.com.br')->first();

        //Update
        $this->visit(route('control.users.admin.read.search', $user->name))
            ->see($user->email);

    }

    /**
     * @test
     */
    public function testMustCheckIfThereIsUserAdministratorsTrashedInSearch()
    {

        $user = new User();

        $faker = \Faker\Factory::create();

        $name = $faker->name;
        $email = $faker->email;

        $res = $user->create([
            'name' => $name,
            'email' => $email,
            'active' => true,
            'admin' => true,
        ]);

        $res->roles()->attach(2);

        $user->destroy($res->id);

        //Update
        $this->visit(route('control.users.admin.read.trashed.search', $name))
             ->see($email);

        $task = $user->withTrashed()->findOrFail($res->id);
        if (!$task->trashed()) {
            $task->delete();
        } else {
            $task->forceDelete();
        }

    }

}
