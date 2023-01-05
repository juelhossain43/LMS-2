<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Clause;
use App\Models\Course;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
     
  

     $this->create_user_with_role('Super Admin', 'Super Admin', 'superadmin@lms.com' );
     $this->create_user_with_role('communication', 'Communication Team', 'communication@lms.com' );
     $teacher=$this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.com' );

    //lead create
    Lead::factory()->count(100)->create();

    $course= Course::create([
      'name'=>'Laravel',
      'description'=>'laravel is a web application framework with expressive, elegant syntax',
      'image'=>'https://laravel-courses.com/storage/series/54e8baab-727e-4593-a78a-e0c22c569b61.png',
      'user_id'=>$teacher->id,
    ]);

    Clause::factory(10)->create();


    }
    private function create_user_with_role($type, $name, $email){
      $role=Role::create([
        'name'=>$type
      ]);

      $user=User::create([
        'name'=>$name,
        'email'=>$email,
        'password'=>bcrypt('password'),
      ]);

      if($type=='Super Admin'){
          $permission=Permission::create([
                 'name' => 'create-admin'
          ]);
          $role->givePermissionTo($permission);

        }
        
      $user->assignRole($role);

      return $user;
      }

  }

