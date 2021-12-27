![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


# Laravel generate QR Code

Hi All!

Here is the example focused on laravel generate pdf using input data using dom-pdf.

### Preview
![input](https://github.com/kcsrinivasa/laravel-generatepdf/blob/main/output/qrgenerate.jpg?raw=true)
![result](https://github.com/kcsrinivasa/laravel-generatepdf/blob/main/output/scan.jpg?raw=true)

PDF is a portable document format and helps us providing the invoices, user manuals, eBooks, application forms, etc. We will understand from starting to finish about how to create a PDF file in Laravel.

DOMPDF is a wrapper for Laravel, and It offers stalwart performance for HTML to PDF conversion in Laravel applications spontaneously

### Step 1: Install Laravel
```bash
composer create-project --prefer-dist laravel/laravel generatepdf
```

### Step 2: Install dom-pdf package
```bash
composer require barryvdh/laravel-dompdf
```
After this command open "config/app.php" file and add service provider and aliase

```javascript
'providers' => [
    ....
    Barryvdh\DomPDF\ServiceProvider::class,
],

'aliases' => [
    ....
    'PDF' => Barryvdh\DomPDF\Facade::class,
],
```

### Step 3: Create controller
```bash
php artisan make:controller CustomerController -r
```
### Step 4: Add routes
```bash
Route::get('/', function(){ return redirect(route('customer.index')); });
Route::get('/customers', 'App\Http\Controllers\CustomerController@index')->name('customer.index');
Route::post('/customers/invoice', 'App\Http\Controllers\CustomerController@invoice')->name('customer.invoice');
Route::get('/customers/invoice-template', 'App\Http\Controllers\CustomerController@invoice_template')->name('customer.invoice_template');
```
### Step 5: Add functions in controller
Add below functions in app/Http/Controllers/CustomerController.php
```bash
    //Load package
    use PDF;
    
    /**
     * Display a index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }


    /**
     * Load a listing of the resource and download.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice(Request $request)
    {
        $invoiceDetails = $request->all();
        // load html page in browser to check data
        // return view('customer.invoice')->withInvoiceDetails($invoiceDetails);
        $pdf = PDF::loadView('customer.invoice',['invoiceDetails' => $invoiceDetails]);
        //download pdf file
        return $pdf->download('invoice.pdf');
    }
    public function invoice_template()
    {
        $pdf = PDF::loadView('customer.invoice_template');
        //download pdf file
        return $pdf->download('invoice_template.pdf');
    }
```

### Step 6: Create blade file

Goto "resources/views/customer/index.blade.php" to grab the index page code

Goto "resources/views/customer/invoice.blade.php" to grab the print html code

### Step 7: Final run and check in browser
```bash
mv server.php index.php
cp public/.htaccess .
```
open in browser
```bash
http://localhost/laravel/generatepdf
```