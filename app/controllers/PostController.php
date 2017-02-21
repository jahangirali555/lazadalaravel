<?php

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;



class PostController extends BaseController {

	/**
	* Aditional methods for API:
	*  - Select all posts by tag or tags
	*  - Count posts by tag or tags
	*/



	
	protected $status_code = 200;
	protected $response = '';


	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	 public function index()
    {
        try{

           $posts = Post::with('tags')->get(); 
		   $this->status_code = 200;

	    }catch (Exception $e){
           
           $this->status_code = 400;
           $posts = '';

		}finally{
			
			return Response::json($posts, $this->status_code);
		}


    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		// empty & not accessible: didn't included in Post's resource routes
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			$this->status_code = 200;
			// get POST data
			$input = Input::all();

			// set validation rules
			$rules = array(
				'title' => 'required'
			);

			// validate input
			$validator = Validator::make($input, $rules);

			// if validation fails, return the user to the form w/ validation errors
			if ($validator->fails()) {
						$this->status_code = 400;
						$messages = $validator->messages()->first();						
						return Helper::getResponse('true', $messages, $this->status_code);

				}
				
				//  -------------------------------- Create new Post instance

				$post = Post::create(array('title' => $input['title']));

				
				//  -------------------------------- Send Email

				if($post){

					$this->_sendSuccessEmail($post);
	            
				}


				//-------------------------------- Attach tags

		        if (!empty($input['tags'])) {

		            $this->_attachTagsToPost(array_unique($input['tags']), $post);
		        }




				// Custom Message
				$messages = array(
								'success' => true, 
								'status' => $this->status_code, 
								'message' => 'Post inserted successfully!',
								'data' => $post,
								);

				return Helper::getResponse('false', $messages, $this->status_code);




			
		} catch (HttpException $e) {

			// Custom Message			
			return Helper::getResponse('true', $e, 400);




			
		}
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Post  $post
	 * @return Response
	 */
	public function show($id)
	{


		try {
			
			$post = Post::findOrFail($id);
			$this->status_code = 200;
            $this->response = false;

			
		} catch (Exception $e) {
			
			$this->status_code = 400;
            $post = 'No record';
            $this->response = true;


		}finally{

			return Helper::getResponse($this->response, $post, $this->status_code);
		}

	}

	 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {	

    	$logArray = array();

       try{
	       $page = Post::findOrFail($id);
	       array_push($logArray, $page);



			if($page->delete()){

				//  ------------------------------------- Log Info
               $logInfo = $this->_createLog($logArray);

			   $this->response= $logInfo;

			}else{

			  $this->response="Post Can not be delted at this time!";
			}
			

		   $this->status_code = 200;
		   
       }catch (Exception $e) {

	       $this->response = $e->getMessage();
		   $this->status_code = 400;


	  }finally{
	  	
			return Helper::getResponse('false', $this->response, $this->status_code);

	  }
	   
    }


	//---------
	// Custom Functions
	//-----------------------

	/**
     * Send a success EMAIL
     *
     * @param array $tags
     */
	public function _sendSuccessEmail($post){

	   $message = "New post has been created!";

	   $data = [];
	   
	   Mail::send('emails.welcome', $data, function($message) use ($data)
       {
        $message->from(Config::get('constants.ADMIN_EMAIL'), Config::get('constants.ADMIN_NAME'));
        $message->subject("New post added");
        $message->to(Config::get('constants.ADMIN_EMAIL'));
       });
	   return Response::json(array('success' => true, 'last_insert_id' => $post->id), 200);
	}



	 /**
     * Attach tags to the Posts.
     *
     * @param array $tags
     */
    private function _attachTagsToPost($tags = [], $post)
    {
        // Detach all tags from the conference
        $post->tags()->detach();

        $tagIds = array_map(function ($tagName) {
            return Tag::firstOrCreate(['name' => $tagName])->id;
        }, $tags);

        $post->tags()->attach($tagIds);
    }

	/**
     * Create Log
     *
     * @param array $post
     */
    public function _createLog($logArray){

    	//-- Log in Laravel.log
    	$log = Log::info('Delete Post Log', $logArray);

    	return $log;
    }

}















