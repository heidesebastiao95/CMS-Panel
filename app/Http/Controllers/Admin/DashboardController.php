<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;


class DashboardController extends Controller
{




    public function index()
    {
        $Comments = $this->latestComments();
        $Posts = $this->latestPosts();

        $totalComments = Comment::count('id');
        $totalPosts = Post::count('id');
        $totalViews = Post::sum('views');
        $followers = User::where('role','user')->count('id');

        $followersProfile = $this->followersProfile();

        $UsersPerMonth = $this->usersPerMonth();
        $postsPerMonth = $this->postsPerMonth();
        $commentsPerMonth = $this->commentsPerMonth();
        $viewsPerMonth = $this->viewsPerMonth();

        //get all dates from users
        $AllDates = User::select('created_at')
        ->orderBy('created_at')
        ->get();

        /*
        *get only the months
        *this will be used in the graph
        *to display the months dynamically
        *
        */
        $monthsWithKeys = $this->getMonths($AllDates);

        //clear keys from array
        $months =[];

       foreach ($monthsWithKeys as $key => $value) 
       {
            $nextMonth = $value;
            array_push($months,$nextMonth);
       }
     

        return view('admin.index',[
            //data
            'latestComments' => $Comments,
            'latestPosts'=> $Posts,
            'totalComments' => $totalComments,
            'totalPosts' => $totalPosts,
            'totalViews' => $totalViews,
            'followers' => $followers,
            'followersProfile'=> $followersProfile,
            'usersPerMonth' => $UsersPerMonth,
            'postsPerMonth'=> $postsPerMonth,
            'commentsPerMonth'=> $commentsPerMonth,
            'viewsPerMonth'=> $viewsPerMonth,

            'months'=> $months,
        ]);

        
    }

    private function latestComments()
    {
        $comments = Comment::orderByDesc('id')->limit(3)->get();

        return $comments;
    }

    private function latestPosts()
    {
        $posts = Post::orderByDesc('id')->limit(3)->get();

        return $posts;
    }

    private function usersPerMonth()
    {
        $numberOfUsers=[];

        $UsersPerMonth = DB::select(
            'SELECT  MONTH(created_at) as Month, COUNT(id) as totalUsersPerMonth from users WHERE role = ? and created_at < ? GROUP BY Month  LIMIT 6'
            ,['user',date_format(now(),'Y-m-j H:i:s')]
        );

        foreach ($UsersPerMonth as $key => $value) 
        {
            $nextUser = $value->totalUsersPerMonth;
            array_push($numberOfUsers,$nextUser);
        }

        return $numberOfUsers;
    }

    private function postsPerMonth()
    {   
        $numberOfPosts = [];
        $postsPerMonth = DB::select(
            'SELECT  MONTH(created_at) as Month, COUNT(id) as totalPostsPerMonth from posts WHERE  created_at <= ? GROUP BY Month  LIMIT 6'
            ,[date_format(now(),'Y-m-j H:i:s')]
        );

        foreach ($postsPerMonth as $key => $value) 
        {
            $next = $value->totalPostsPerMonth;
            array_push($numberOfPosts,$next);
        }

        return $numberOfPosts;
    }

    private function commentsPerMonth()
    {
        $numberOfComments = [];
        
        $commentsPerMonth = DB::select(
            'SELECT  MONTH(created_at) as Month, COUNT(id) as totalCommentsPerMonth from comments WHERE  created_at <= ? GROUP BY Month  LIMIT 6'
            ,[date_format(now(),'Y-m-j H:i:s')]
        );

        foreach ($commentsPerMonth as $key => $value) 
        {
            $next = $value->totalCommentsPerMonth;
            array_push($numberOfComments,$next);
        }

        return $numberOfComments;
    }

    private function viewsPerMonth()
    {
        $numberOfViews = [];

        $viewsPerMonth = DB::select(
            'SELECT MONTH(created_at) as Month, SUM(views) as totalViewsPerMonth from posts WHERE created_at <= ? GROUP BY Month  LIMIT 6;
            '
            ,[date_format(now(),'Y-m-j H:i:s')]
        );

        foreach ($viewsPerMonth as $key => $value) 
        {
            $next = $value->totalViewsPerMonth;
            array_push($numberOfViews,$next);
        }

        return $numberOfViews;
    }

    private function getMonths($dates)
    {

        $Months = [];

        foreach ($dates as $key => $value) {

            $nextMonth = date_format($value->created_at,'M');
            array_push($Months,$nextMonth);
        }

        return array_unique($Months);
    }

    private function followersProfile()
    {
        $followersProfile = [];

        $followersM = DB::select(
            'SELECT COUNT(id) * 100/(SELECT COUNT(id) from users WHERE role = ?) as total from users where gender = ? and role = ?'
        ,['user','M','user']);

        foreach ($followersM as $key => $value) {
            array_push($followersProfile,$value->total);  
        }

        $followersF = DB::select(
            'SELECT COUNT(id) * 100/(SELECT COUNT(id) from users WHERE role = ?) as total from users where gender = ? and role = ?'
        ,['user','F','user']);

        foreach ($followersF as $key => $value) {
            array_push($followersProfile,$value->total);  
        }

        return $followersProfile;
    }
}
