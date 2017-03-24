<?php

namespace App\Http\Controllers\Tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Excel;

class PaymentsController extends Controller
{

    public function excel()
    {
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $users = User::select('id', 'name','email','created_at')->limit(200)->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $usersArray = [];

        // Define the Excel spreadsheet headers
        $usersArray[] = ['id', 'customer','email','created_at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($users as $user) {
            $usersArray[] = $user->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('users', function($excel) use ($usersArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Usuários');
            $excel->setCreator('Vialoja')->setCompany('Nome Loja, LLC');
            $excel->setDescription('Base de Usuários');

            //http://stackoverflow.com/questions/25998397/laravel-excel-exporting-from-a-model-styling-issues


            // $excel->sheet('_export_' . Carbon::now()->format('m_d_Y_g_i_a'), function($sheet) use ($rows) {
            //   $sheet->cell('A1:B1:C1:D1:E1:F1:G1:H1:I1:J1:K1:L1:M1:N1:O1:P1', function($cell) {
            //
            //     $cell->setFontSize(14);
            //
            //     $cell->setFontWeight('bold');
            // });

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($usersArray) {

                 $sheet->appendRow(array_keys($usersArray[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontFamily('Comic Sans MS');
                    //$row->setFontSize(13);
                    $row->setFontWeight('bold');

                });

                $sheet->fromArray($usersArray, null, 'A1', false, false);
            });


        })->download('xlsx');
    }

}
