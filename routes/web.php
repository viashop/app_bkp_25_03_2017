<?php

Route::get('/login', function() {
    return redirect('/?urlReturn='. urlencode( URL::previous() ) );
});

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});


//Tests

Route::get('/viewpdf', 'Tests\PdfviewController@index');

Route::get('/payments/excel',
[
  'as' => 'admin.invoices.excel',
  'uses' => 'Tests\PaymentsController@excel'
]);
