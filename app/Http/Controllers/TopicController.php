<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Topic;
use App\Http\Resources\TopicResource;

class TopicController extends Controller
{
    public function listTopicsWithComments()
    {
    	$topics = Topic::latest()->paginate();
    
    	return TopicResource::collection($topics);
    }
}
