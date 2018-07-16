<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\UserPhoto;
use App\Models\UserProfile;

class UserRepository implements UserRepositoryContract
{

    public function index()
    {
        $data = DB::table('users')
                    ->select('users.*')
                    ->where('users.user_id', '=', Auth::user()->user_id)
                    ->first();
        return $data;
    }

    public function update($input)
    {
        // echo "<pre>";print_r($input);exit;
    	DB::beginTransaction();
    	try{
    		//Update users
    		DB::table('users')
                ->where('user_id', Auth::user()->user_id)
                ->update([
                    'name'	=> $input['nameUser'],
                    'email'	=> $input['emailUser'],
                ]);

            //Update image
	        if(!empty($input['file_avatar_user'])){
	        	$filename = uniqid() . "." . $input["file_avatar_user"]->getClientOriginalExtension();
	        	$data = array(
	        		'user_id' 		=> Auth::user()->user_id,
	        		'type' 			=> '1',
	        		'filename' 		=> $filename,
	        		'filepath' 		=> config('constants.avatar_savedir'),
	        		'size' 			=> $input["file_avatar_user"]->getSize(),
	        		'mime' 			=> $input["file_avatar_user"]->getMimeType(),
	        		'org_filename' 	=> $input["file_avatar_user"]->getClientOriginalName(),
	        	);

	        	$check_photo = DB::table('user_photo')->select('*')->where('user_id', '=', Auth::user()->user_id)->first();
	        	if(!empty($check_photo)){
	        		//Delete dir image_user
	        		$image_path = config('constants.avatar_savedir')."/".$check_photo->filename;
					if(\File::exists($image_path)) {
					    \File::delete($image_path);
					}
					//Update image_user
	        		UserPhoto::find($check_photo->user_photo_id)->update($data);
	        		move_uploaded_file($_FILES['file_avatar_user']['tmp_name'], config('constants.avatar_savedir')."/".$filename);
	        	}else{
	        		//Create image_user
	        		UserPhoto::create($data);
	        		move_uploaded_file($_FILES['file_avatar_user']['tmp_name'], config('constants.avatar_savedir')."/".$filename);
	        	}
	        }

            //Check phoneUser
            $phoneUser = '';
            if (!empty($input['phoneUser'])) {
                foreach ($input['phoneUser'] as $key => $value) {
                    $phoneUser =  $phoneUser.$input['phoneUser'][$key].',';
                }
                $phoneUser = rtrim($phoneUser, ',');
            }

            //Check genderUser
            $genderUser = 0;
            if (!empty($input['genderUser'])) {
                $genderUser = $input['genderUser'];
            }

            //Check cityUser
            $cityUser = 0;
            if ($input['cityUser'] != '-1') {
                $cityUser = $input['cityUser'];
            }

            $data_profile = array(
                'user_id'       => Auth::user()->user_id,
                'phone'         => $phoneUser,
                'address'       => $input['addressUser'],
                'birthday'      => $input['birthdayUser'],
                'gender'        => $genderUser,
                'city'          => $cityUser,
                'facebook'      => $input['facebookUser'],
                'information'   => $input['informatinoUser'],
            );

            $check_profile = DB::table('user_profile')->select('*')->where('user_id', '=', Auth::user()->user_id)->first();
            if(!empty($check_profile)) {
                //Update profile
                UserProfile::find($check_profile->user_profile_id)->update($data_profile);
            }else{
                //Create profile
                UserProfile::create($data_profile);
            }

            DB::commit();
        	return true;
    	} catch(\Exception $e) {
    		DB::rollback();
    		return false;
    	}
    }

    public function checkImage()
    {
    	$data = DB::table('user_photo')->select('*')->where('user_id', '=', Auth::user()->user_id)->first();
    	return $data;
    }

    public function getCity()
    {
        $data = DB::table('city')->select('*')->whereNull('deleted_at')->get();
        return $data;
    }

}