<?php

class TagController extends BaseController {


    /**
     * @param  string $name Tag name
     * @return JSON Response
     */
    public function show($name)
    {
        # Step 1: Input Validation
            // set validation rules
        $input = array('name' => $name);
        $rules = array(
            'name' => 'alpha|required',
            );

            // validate input
        $validator = Validator::make($input, $rules);

            // if validation fails, return the user to the form w/ validation errors
        if ($validator->fails()) {
            $messages = $validator->messages()->first();                        
            return Helper::getResponse('true', $messages, 400);

        }

        # Step 2: Get Data from Model
            //-- Get tag by tag name with posts
            $tag = Tag::with('posts')->where('name', 'like', $name)->remember(10)->take(1)->get();

        # Step 3: Output JSON 
            // Custom message
            $messages = array('data' => $tag);

        //-- Json Response
        return Helper::getResponse('false', $messages, 200);


    }

     /**
     * @param  string $name Tag name
     * @return JSON Response
     */
     public function getCount($name)
     {
        # Step 1: Input Validation
            // set validation rules
        $input = array('name' => $name);
        $rules = array(
            'name' => 'alpha|required',
            );

            // validate input
        $validator = Validator::make($input, $rules);

            // if validation fails, return the user to the form w/ validation errors
        if ($validator->fails()) {
            $messages = $validator->messages()->first();                        
            return Helper::getResponse('true', $messages, 400);

        }

        # Step 2: Get Data from Model
            // Get tag by Post (with Pivot Coulmn)
        $tag = Tag::with('posts')->where('name', 'like', $name)->remember(10)->get()->toArray();
            $getcount = sizeof($tag[0]['posts']); // get count

        # Step 3: Output JSON 
            // Custom message
            $messages = array(
                'tag' => $name,
                'count' => $getcount
                );
            
        // Json Response
            return Helper::getResponse('false', $messages, 200);


        }


    }