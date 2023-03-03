<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Facades\DB; 

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        //DB::table('departments')->delete();
        $sql = database_path(path: 'sql/departamento.sql');

        DB::unprepared(\file_get_contents($sql));
        /**foreach($data as $item){
            Department::create(array(
                'id' => $item->id_departamento,
                'name' => $item->departamento,
            ));
        }**/

    }
}
