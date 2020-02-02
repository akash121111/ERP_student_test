<?php

use App\Student;
use App\Medical;
use App\Address;
use App\Address_types;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/allstudent', function () {
   
$student=Student::all();
return $student;

});



Route::get('/student/id/{id}', function ($id) {
   
    $student=Student::find($id);
    return $student;
    
    });

    Route::get('/student/rollno/{rollno}', function ($rollno) {
   
        $student=Student::where('Roll_no',$rollno)->get();
        return $student;
        
        });

        Route::get('/student/male', function () {
   
            $student=Student::where('Gender','male')->get();
          
            foreach($student as $stu) {
                return $stu->First_name;
            }
            });

            Route::get('/studentblood/medical', function ($id) {
   
                $student=Student::find($id)->medical;
                return $student;
               
                
                });

                Route::get('/studentblood/medical/{id}', function ($id) {
   
                    return Medical::where('Blood_group',$id)->rightJoin('Students','Medicals.Students_id','=','Students.id')->select('*')->get();
                    });

                    Route::get('/autosearch/{id}', function ($id) {
   
                        $rid=$id.'%';
                        return Student::where('First_name', 'like',$rid)->get('First_name');
                        });
                 


                        Route::get('/findaddress/{id}', function ($id) {
   
                            $student=Address::where('students_id',$id)->get();
                            return $student;
                            
                           
                            
                            });



                        Route::get('/address/{id}', function ($id) {
   
                            $student=Address::where('City',$id)->get();
                            foreach($student as $stu){
                                $name=Student::where('id',$stu->Students_id)->get('First_name');
                                echo  $name;
                                echo $student;
                            }
                            
                            // return $student;
                            
                           
                            
                            });




