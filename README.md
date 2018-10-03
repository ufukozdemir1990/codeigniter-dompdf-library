# Codeigniter Dompdf Library

This is basically just a CI 3.0+ wrapper for the dompdf library. Very basic functions at the moment, you can find an example controller in the files.

Demo: http://www.ufukozdemir.website/github/codeigniter-dompdf-library/

Installation
------------

1.  Copy system/application/libraries/dompdf folder ()the whole thing to your application/libraries folder
2.  Copy system/application/libraries/pdf.php to your application/libraries folder

Usage
------

### Basic
	
There are 4 options you a required to set in order to create a PDF; folder, filename, paper and HTML
```php	
//Load the library
$this->load->library('pdf');

//Set folder to save PDF to
$this->pdf->folder('./assets/pdfs/');

//Set the filename to save/download as
$this->pdf->filename('test.pdf');

//Set the paper defaults
$this->pdf->paper('a4', 'portrait');

//Load html view
$this->pdf->html(<h1>Some Title</h1><p>Some content in here</p>);
```
The create function has two options 'save' and 'download'. Save will just write the PDF to the folder you choose in the settings. Download will force the PDF to download in the clients browser.
```php
//Create the PDF
$this->pdf->create('save');
```
### Advanced usage

Theres no reason why you can't build and pass a view to the html() function. Also note the create() function will return the saved path if you choose the 'save' option.

```php
$data = array(
	'title' => 'PDF Created',
	'message' => 'Hello World!'
);

//Load html view
$this->pdf->html($this->load->view('pdf', $data, true));

if($path = $this->pdf->create('save')) {
	//PDF was successfully saved or downloaded
	echo 'PDF saved to: ' . $path;
}
```
### Emailing a PDF

You can use the path returned by the create() function to email the PDF using the CI email class
```php
if($path = $this->pdf->create('save')) {

	$this->load->library('email');

	$this->email->from('your@example.com', 'Your Name');
	$this->email->to('someone@example.com'); 

	$this->email->subject('Email PDF Test');
	$this->email->message('Testing the email a freshly created PDF');	

	$this->email->attach($path);

	$this->email->send();

}
```
