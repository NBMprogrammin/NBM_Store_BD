<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCategory;
use App\Models\userPasswordStting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userCategoryController extends Controller
{
    
    //start faunctions For Category
    
    // Start Show Category For User
    public function index() {
        $user_id = strip_tags(Auth::user()->id);
        if(Auth::check()){
            $MyCategoryAll = Auth::user()->userCategory()->paginate(10);
                return response()->json([
                'merssage' => 'Success Get All My Category',
                'data' => $MyCategoryAll
            ]);
        }else {
        $MyCategoryAll = Auth::user()->userCategory;
            return response()->json([
            'merssage' => 'Sore Semthing Has In Error',
            'data' => $MyCategoryAll
        ]);
        }
    } //=== End Show Category For User ===//

    function sereach(Request $request) {
        $request->validate([
            'categoryToSereach' => 'required|string',
        ]);

        $categoryToSereach = strip_tags($request->categoryToSereach);

        $SheckCategory = Auth::user()->userCategory()->where('category', 'LIKE', $categoryToSereach. '%')->get();

        return response()->json([
            'message' => 'Are You Search To',
            'data' => $SheckCategory
        ]);
    }

    // Start Create Category For User 
    function store(Request $request) {
        $request->validate([
            'category' => 'required|max:100',
            'passwordSetting' => 'required|string|max:10|unique:user_password_sttings,password'
        ]);
        $user_id = Auth::user()->id;
        $passwordStingHa = strip_tags($request->passwordSetting);
        $shekpas = userPasswordStting::where('user_id', $user_id)->first();
        if($shekpas === null) {
            return response()->json([
                'message' => 'Your`e Not Have Eny Password Setting Son Plz Go To Create',
                'data' => 5
            ]);
        }
        $passwordStingHaahing = Hash::make($passwordStingHa);
        $passwordHash = $shekpas->password;
        $categorName = strip_tags($request->category);
        $redPassword = request('passwordSetting');

        if($passwordHash) {
        if(Hash::check($redPassword, $passwordHash)) {
         
        $SheckThisName = Auth::user()->userCategory->where('category', $categorName)->first();
        if($SheckThisName) {
            return response()->json([
                'message' => 'This Category is On leary Created',
                'data' => 3
            ]);
        }
        $categorydate = UserCategory::create([
            'user_id' => $user_id,
            'category' => $categorName,
        ]);

        return response()->json([
            'message' => 'seccuess Create Category',
            'data' => $categorydate,
        ],201);

        } else {
        
        return response()->json([
            'message' => 'Password Sting Is Not Corect',
            'data' => 2,
        ],200);
        }
        } else {
            return response()->json($data, 200, $headers);
        }
        // $categorName = strip_tags($request->category);
        return $dat;

        
    }//=== End Create Category For User ===//

    // Start Update Category For User 
    function update(Request $request, $CategoryID) {
        $request->validate([
            'category' => 'required|max:100',
            'passwordSetting' => 'required|string|max:10|unique:user_password_sttings,password'
        ]);

        $user_id = Auth::user()->id;
        $passwordStingNow = strip_tags($request->passwordSetting);
        $shekpas = userPasswordStting::where('user_id', $user_id)->first();
        $passwordStingHaahing = Hash::make($passwordStingNow);
        $passwordHash = $shekpas->password;
        $categorName = strip_tags($request->category);
        $redPassword = request('passwordSetting');

        $CategoryUpdate = strip_tags($request->category);
        $CategoryID = strip_tags($CategoryID);
        $MyCategory = Auth::user()->userCategory->where('id', $CategoryID)->first();
        if(Hash::check($redPassword, $passwordHash)){
            
            if($MyCategory) {
                $MyCategory->update([
                    'category' => $CategoryUpdate
                ]);
    
                return response()->json([
                    'message' => 'Success Update This Category',
                    'data' => $MyCategory,
                ],201);
            } else {
                return response()->json([
                    'message' => 'Sory You Dont Can Update This Category',
                    'data' => 0
                ],200);
            }

        } else {
            return response()->json([
                'message' => 'password is Not corect',
                'data' => 2
            ]);
        }
        
    }//=== End Update Category For User ===//

     // Start Update Category For User 
    function delate(Request $request, $CategoryID) {
        $request->validate([
            'passwordSetting' => 'required|string|max:10|unique:user_password_sttings,password'
        ]);

        $user_id = strip_tags(Auth::user()->id);
        $passwordStingNow = strip_tags($request->passwordSetting);
        $shekpas = userPasswordStting::where('user_id', $user_id)->first();
        $passwordStingHaahing = Hash::make($passwordStingNow);
        $passwordHash = $shekpas->password;
        $categorName = strip_tags($request->category);
        $redPassword = request('passwordSetting');

        $CategoryID = strip_tags($CategoryID);
        $MyCategory = Auth::user()->userCategory->where('id', $CategoryID)->first();
        if(Hash::check($redPassword, $passwordHash)){
            
            if($MyCategory) {
                Auth::user()->userCategory->findOrFail($CategoryID)->delete();
                // Auth::user()->userCategory->where('id', $CategoryID)->delete();
    
                return response()->json([
                    'message' => 'Success delate This Category',
                    'data' => 1,
                ],201);
            } else {
                return response()->json([
                    'message' => 'Sory You Dont Can delate This Category',
                    'data' => 0
                ],200);
            }

        } else {
            return response()->json([
                'message' => 'password is Not corect',
                'data' => 2
            ]);
        }
        
    }//=== End Update Category For User ===//

    //=== End faunctions For Category ===//

}
