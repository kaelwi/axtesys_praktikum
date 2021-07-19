<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;

class ContactController extends Controller
{
   // Show all DB records, by default ordered by the last name
    public function showAll() {
		$contacts = Contact::orderBy('lastName')->get();
		return view('contacts', ['contacts' => $contacts]);
	}
	
	// Get users input on how to order DB records and redirect to a function which can return a view
	public function ordered(Request $request) {
		$selected = $request->get('order');
		return redirect()->route('ordered', ['by' => $selected]);
	}
	
	// To be able to return a view (not possible with a POST method)
	public function showOrdered($by) {
		if ($by == 'friends') {
			$contacts = Contact::orderBy($by, 'desc')->get();
		} else {
			$contacts = Contact::orderBy($by)->get();
		}
		
		return view('contacts', ['contacts' => $contacts]);
	}
	
	// Delete chosen contact
	public function deleteContact($id) {
		$contact = DB::table('contacts')->where('id', $id);
		$contact->delete();
		return redirect('/');
	}
	
	// Add new contact to DB
	public function addContact(Request $request) {
		// validate NOT NULL fields
		$this->validate($request, [
			'firstName' => 'required']);
			
		$contact = new Contact;
		$contact->lastName = $request->lastName;
		$contact->firstName = $request->firstName;
		$contact->phone_number = $request->phone_number;
		$contact->email = $request->email;
		
		if (empty($request->input('friends'))) {
			$contact->friends = 0;
		} else {
			$contact->friends = $request->friends;
		}
		
		$contact->save();
		return redirect('/');
	}
		
	public function test() {
		if(view()->exists('test11')) {
			return view('test');
		} 
		return response()->json('View not found!', 404);
	}
}
