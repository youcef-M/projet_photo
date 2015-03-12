<?php

use Lib\Validation\Vote\VoteCreateValidator         as VoteCreateValidator;
use Lib\Validation\Vote\VoteExistValidator          as VoteExistValidator;
use Lib\Validation\Vote\VoteDestroyValidator        as VoteDestroyValidator;
use Lib\Gestion\Vote\VoteGestion                    as VoteGestion;
use Lib\Check\Vote\VoteCheck                        as VoteCheck;

class VoteController extends \BaseController {

    public function __construct(
        VoteCreateValidator         $create_validation,
        VoteExistValidator          $exist_validation,
        VoteDestroyValidator        $destroy_validation,
        VoteGestion                 $vote_gestion,
        VoteCheck                   $vote_check
    )
    {
        $this->create_validation    = $create_validation;
        $this->exist_validation     = $exist_validation;
        $this->destroy_validation   = $exist_validation;
        $this->vote_gestion         = $vote_gestion;
        $this->vote_check           =$vote_check;
    }


    public function likes($id)
    {
    	if ($this->vote_check->missingPost($id)) {
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->vote_gestion->likes($id),'likes');
		}
    }
    
    public function dislikes($id)
    {
    	if ($this->vote_check->missingPost($id)) {
			return BaseController::httpNotFound();
		}else{
			return BaseController::httpContent($this->vote_gestion->dislikes($id),'dislikes');
		}
    }

    
    public function like()
    {
        if($this->create_validation->fails())
        {
            return BaseController::httpError($this->create_validation);
        }else{
        	if ($this->vote_check->badVote()) 
        	{
    			return BaseController::httpNotFound();
    		}elseif(!$this->vote_check->missingVote()){
    		    return BaseController::httpExist();
    		}else{
    			$this->vote_gestion->like();
    			return BaseController::httpOk();
    		}
        }
    }
    
    public function dislike()
    {
        if($this->create_validation->fails())
        {
            return BaseController::httpError($this->create_validation);
        }else
    	    if($this->vote_check->badVote()) 
    	    {
			    return BaseController::httpNotFound();
		    }elseif(!$this->vote_check->missingVote()){
    		    return BaseController::httpExist();
    		}else{
			    $this->vote_gestion->dislike();
			    return BaseController::httpOk();
		    }
    }
		
    
    
	public function voted()
	{
        if($this->exist_validation->fails())
        {
            return BaseController::httpError($this->exist_validation);
        }else{
            if($this->vote_check->missingVote())
            {
                return BaseController::httpNotFound();
            }else{
                return BaseController::httpOk();
            }
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
	   if ($this->vote_check->badVote()) {
			return BaseController::httpNotFound();
		}else{
			$this->vote_gestion->destroy();
			return BaseController::httpOk();
		}
		
	}


}
