<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Redirect;
use Response;
use Storage;

class AvatarController extends Controller
{
    public function AdminAvatar($avatarName)
        {
            $fileName = storage_path()."/app/admins/avatars/$avatarName";
    
            if (File::exists($fileName))
            {
                return Response::download($fileName);
            }
    
            return Response()->json(['message' => $fileName . ' Avatar file not found.']);

        }

        public function DelAdminAvatar($avatarName)
        {
            $fileName = storage_path()."/app/admins/avatars/$avatarName";
    
            if (File::exists($fileName))
            {
                File::delete($fileName);
                return Response()->json(['message' => $fileName . ' Avatar file deleted.']);
            }
    
            return Response()->json(['message' => $fileName . ' Avatar file not found.']);

        }


        public function StudentAvatar($avatarName)
        {
            $fileName = storage_path()."/app/students/avatars/$avatarName";
    
            if (File::exists($fileName))
            {
                return Response::download($fileName);
            }
    
            return Response()->json(['message' => $fileName . ' Avatar file not found.']);

        }

        public function DelStudentAvatar($avatarName)
        {
            $fileName = storage_path()."/app/students/avatars/$avatarName";
    
            if (File::exists($fileName))
            {
                File::delete($fileName);
                return Response()->json(['message' => $fileName . ' Avatar file deleted.']);
            }
    
            return Response()->json(['message' => $fileName . ' Avatar file not found.']);

        }
    
}
