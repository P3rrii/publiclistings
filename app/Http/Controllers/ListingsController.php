<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{
    //Function that executes when the class is created
    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]); // We will apply the auth middleware to all the functions in this class except the index and show.
    }

    //Index Displaying All Listings 
    public function index(){
        $listings = Listing::orderBy('created_at','desc')->get(); // Once Again we do it in a different way we do not have to do ->all() We can also do a ->get() and we will short it by date created in a descenting order.
        return view('listings')->with('listings',$listings);

    }

    //Function For Creation (Form)
    public function create(){
        return view('createlisting');

    }

    //Function For Storing In Database
    public function store(Request $request){
        //First we validate the data and we will make the name and the email required.
        $this->validate($request, [
            'name'=>'required',
            'email'=>'email',
        ]);

        /*
            Creating Listing In A Different way from CMS. 
            We Will not use the :
            $input = $request ->all()
            Listing::create($input) 
            We will pass in each value individualy like an Assoc Array
        */

        $listing = new Listing;
        $listing-> name = $request->input('name');
        $listing-> website = $request->input('website');
        $listing-> email = $request->input('email');
        $listing-> phone = $request->input('phone');
        $listing-> address = $request->input('address');
        $listing-> bio = $request->input('bio');
        $listing-> user_id = Auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success','Listing Added');
    }

    //Show Individual Listing
    public function show($id){
        
        $listing = Listing::findOrFail($id);
        return view('showlisting')->with('listing',$listing);
    }

    //Function For Editing Listings (Form)
    public function edit($id){
        $listing=Listing::findOrFail($id);
        return view('editlisting')->with('listing',$listing); //This is also a way to pull data to a view if it is only a single model we are pulling.
    }

    //Function For Updating In Database(It is pretty similar to Store but instead of making a new Instance we just find the one with the $id)
    public function update(Request $request, $id){ // <- We get the ID, that is from the URL 

        $this->validate($request, [
            'name'=>'required',
            'email'=>'email',
        ]);

        $listing = Listing::findOrFail($id);
        $listing-> name = $request->input('name');
        $listing-> website = $request->input('website');
        $listing-> email = $request->input('email');
        $listing-> phone = $request->input('phone');
        $listing-> address = $request->input('address');
        $listing-> bio = $request->input('bio');
        $listing-> user_id = Auth()->user()->id;

        $listing->save();

        return redirect('/dashboard')->with('success','Listing Updated!');
    }

    //Function For Deleting From Database
    public function destroy($id){
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return redirect('/dashboard')->with('success','Listing Deleted');

    }
}
