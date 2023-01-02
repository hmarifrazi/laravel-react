<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\PhoneExt;
use App\Models\ProductReview;
use App\Models\Wishlist;
use App\Models\Order;
use Illuminate\Http\Request;
use  App\Http\Requests\Customer\SignUpRequest;
use  App\Http\Requests\Customer\NewReviewRequest;
use  App\Http\Requests\Customer\UpdateCustomerRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
use Session;
use PDF;


class CustomerController extends Controller
{

    use ResponseTrait;
    public function signin(Request $request){
        return view('frontend.customer.signin',compact('request'));
    }

    public function validsignin(Request $request){
        try{
            $contact=explode('-',$request->contact);
            if(count($contact)<2){
                return redirect()->back();
            }
            $check_cust=Customer::where('email',$request->email)
                                ->where('contact_ext',$contact[0])
                                ->where('contact',$contact[1])
                                ->first();

            if($check_cust){
                if($check_cust->status == 0){
                    return redirect()->back();
                }else{
                    $this->setSession($check_cust);
                    return redirect(route($request->p,$request->email));
                }
            }else{
                return redirect()->back();
            }

        }catch(Exception $e){
            //dd($e);
            return redirect()->back();
        }

    }

    protected function setSession($user){
        return request()->session()->put([
            'user' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'contact_ext' => $user->contact_ext,
            'contact' => $user->contact,
            'type' => 'Signed in with email address:'
        ]);
    }

    public function logout(){
        request()->session()->flush();
        return redirect(route('front.home'));
    }

    public function signup(Request $request){
        return view('frontend.customer.signup',compact('request'));
    }

    public function store(SignUpRequest $request)
    {
       try{
        //    $contact=explode('-',$request->contact);
        //     if(count($contact) < 2){
        //         return redirect()->back();
        //     }
            $cust = new Customer;
            $cust->first_name = $request->first_name;
            $cust->last_name = $request->last_name;
            $cust->email = $request->email;
            $cust->contact_ext =$request->contact_ext;
            $cust->contact = $request->contact;
            $cust->address = $request->address;
            $cust->country_id = $request->country_id;
            $cust->state_id = $request->state_id;
            $cust->city_id = $request->state_id;
            $cust->status = 1;
            if($cust->save()){
                return redirect(route('customer.index'));
                // $this->setSession($cust);
                // return redirect(route($request->p))->with($this->responseMessage(true, null, $request->email));
            }
       }catch(Exception $e){
            dd($e);
            return redirect()->back();
        }
    }

    public function review(NewReviewRequest $request){
        try{
            $rev = new ProductReview;
            $rev->name = $request->name;
            $rev->review = $request->review;
            $rev->rating = $request->rating;
            $rev->product_id = $request->product_id;
            $rev->created_by = session()->get('user')?session()->get('user'):0;
            if($rev->save()){
                return redirect()->back();
            }
        }catch(Exception $e){
            //dd($e);
            return redirect()->back();
        }
    }

    public function wishlist(Request $request){
        try{
            $rev = new Wishlist;
            $rev->product_id = $request->id;
            $rev->customer_id = session()->get('user');
            if($rev->save()){
                return redirect(route($request->p));
            }
        }catch(Exception $e){
            //dd($e);
            return redirect()->back();
        }
    }

    public function cprofile(){
        if(!session()->get('user'))
            return redirect(route('front.signin'))->with($this->responseMessage(true, null, "If you have ayn account, sign in first or register now."));
        
        $country=Country::get();
        $state=State::get();
        $city=City::get();
        $context=PhoneExt::get();
        $user=Customer::find(session()->get('user'));
        return view('frontend.customer.customerprofile',compact('context','country','state','city','user'));
    }
function profileup(UpdateCustomerRequest $request){
        try{
            if(!session()->get('user'))
                return redirect(route('front.signin'))->with($this->responseMessage(true, null, "If you have ayn account, sign in first or register now."));
        
            $cust = Customer::find(session()->get('user'));
            $cust->first_name = $request->first_name;
            $cust->last_name = $request->last_name;
            $cust->email = $request->email;
            $cust->contact_ext = $request->contact_ext;
            $cust->contact = $request->contact;
            $cust->address = $request->address;
            $cust->zip = $request->zip;
            $cust->country_id = $request->country_id;
            $cust->state_id = $request->state_id;
            $cust->city_id = $request->city_id;
            if($cust->save()){
                $this->setSession($cust);
                return redirect()->back()->with($this->responseMessage(true, null, "Your profile has been updated."));
            }
         }catch(Exception $e){
            //dd($e);
            return redirect()->back()->with($this->responseMessage(false, "error", "Please try again!"));
        }
    }
     public function order_list(){
        if(!session()->get('user'))
            return redirect(route('front.signin'))->with($this->responseMessage(true, null, "If you have ayn account, sign in first or register now."));
        $order=Order::where('customer_id',session()->get('user'))->latest()->get();
        return view('frontend.customer.orderlist',compact('order'));
    }

    public function invoice($id){
        if(!session()->get('user'))
            return redirect(route('front.checkout'))->with($this->responseMessage(true, null, "you have to login or order as a guest."));
        
        $order=Order::find($id);
          
        return view('frontend.customer.invoice',compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $customers = Customer::paginate(10);
        return view('backend.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = PhoneExt::get(['id','ext']);
        $country = Country::get(['id','country']);
        $state = State::get(['id','state']);
        $city = City::get(['id','city']);
        return view('backend.customers.create',compact(['context','country','state','city']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
