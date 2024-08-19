<?php
       
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\CxsUser;
use Validator;
use App\Http\Resources\UsersResource;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;  // Import the Mail facade
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendOtpMail;

       
class ManageUsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CxsUsers = CxsUser::select('user_id','user_email','user_status','company_name', 'full_name', 'creation_date','created_by','last_updated_by','last_update_date', 'user_type', 'last_update_date')->get();
        return $CxsUsers;
        
        // return $this->sendResponse(UsersResource::collection($products), 'Users retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request): JsonResponse
    // {
    //     $input = $request->all();
       
    //     $validator = Validator::make($input, [
    //         'full_name' => 'required',
    //         'user_email' => 'required'
    //     ]);
       
    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }
       
    //     $product = CxsUser::create($input);
       
    //     return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    // } 

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:cxs_user,user_email',
        ]);

        $user = CxsUser::select("user_id","company_id","user_email","full_name")->where('user_email', $request->email)->first();
// dd($user);
        // Generate OTP
        $otp = Str::random(6);  // Generate a 6-character random string
        $user->otp = $otp;
        $user->upassword = Hash::make($otp);
        $user->force_reset_flag = "Y";  
        $user->save();

        // Send OTP via email
        Mail::to("nagunurikaveri@gmail.com")->send(new SendOtpMail($otp));

        return response()->json([
            'message' => 'OTP sent to your email address.',
        ]);
    }

     
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id): JsonResponse
    // {
    //     $product = Product::find($id);
      
    //     if (is_null($product)) {
    //         return $this->sendError('Product not found.');
    //     }
       
    //     return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    // }
      
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Product $product): JsonResponse
    // {
    //     $input = $request->all();
       
    //     $validator = Validator::make($input, [
    //         'name' => 'required',
    //         'detail' => 'required'
    //     ]);
       
    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());       
    //     }
       
    //     $product->name = $input['name'];
    //     $product->detail = $input['detail'];
    //     $product->save();
       
    //     return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    // }
     
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Product $product): JsonResponse
    // {
    //     $product->delete();
       
    //     return $this->sendResponse([], 'Product deleted successfully.');
    // }
}
