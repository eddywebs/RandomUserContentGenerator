<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
	//return View::make('hello');
});

Route::get('/fakeContent', function()
{
	$num = Input::get('paras');

	//default the number of paras to 1 if page is called outside form submission
	if($num==null)
		$num='1';
	$validationMessage=null;
	$paragraphs='';
	//basic form error checking
	if(ctype_digit($num)==false || $num>9)
		{
			$validationMessage="A valid number < 9 is requred for number of paras. You entered: $num";
			$num='0';
		}
	else
	{
		$generator = new Badcow\LoremIpsum\Generator();
	    $paragraphs = implode('<p>', $generator->getParagraphs($num));
    }
    $data=array("content"=>$paragraphs, "num"=>$num, "fakeContentNavClass"=>'active', "validationMessage"=>$validationMessage);
        //api to return as json object
    if (Input::get('type')=="json")
    	return json_encode($data["content"]);

	return View::make('fakeContent', $data);//->with('content', $paragraphs, 'num');
});


Route::get('/fakePerson', function()
{	
	$fakePerson = Faker\Factory::create();
	$count=Input::get('count');
	//echo $count;

	if($count==null) //set count to 0 once arriving at form
		$count=0;

	$validationMessage=null;

	if(ctype_digit($count)==false || $count>99){
		$count=0;
		$validationMessage ="Please enter a valid number less than 99.";
	}
		

	class person{
		public $firstName;
		public $lastName;
		public $dob;
		public $streetAddress;
		public $city;
		public $state;
		public $zip;
		public $country;
		public $username;
		public $password;
		public $description;
	}

	$profiles = array();
	for ($i=0; $i < $count; $i++) {

		$entry = new person();
		$fname= $fakePerson->firstName;
		$lname=$fakePerson->lastName;
		$entry->firstName = $fname;
		$entry->lastName = $lname;
		$entry->dob = $fakePerson->date;
		$entry->streetAddress=$fakePerson->streetAddress;
		$entry->city=$fakePerson->city;
		$entry->state=$fakePerson->state;
		$entry->zip=$fakePerson->postcode;
		$entry->country="USA";//hard coding country since its all US addresses
		$entry->username="$fname.$lname"."2";
		$entry->password=$fakePerson->password;
	    $entry->description=$fakePerson->paragraph;
		$profiles[$i] =$entry; 
}

	$data=array("profiles"=>$profiles, "count"=>$count, "validationMessage"=>$validationMessage);
    
    //api to return as json object
    if (Input::get('type')=="json")
    	return json_encode($data["profiles"]);

	return View::make('fakePerson')->with('data', $data);
	//return View::make('fakePerson', $data);
});

Route::get('/sandbox', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');
    $url = route('fakeContent');
    # Here we explicitly include the namespace in our call to the `Pre` class and the `render()` method.
    //echo Pre::render($fruit,'Fruit');
    echo $url;

});