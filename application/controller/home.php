<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load view
        require APP . 'view/home/index.php';
    }
    
    public function load() {
    	$evs = $this->model->getEvents();
    	echo json_encode($evs);
    }
    
    public function insert() {
    	if(isset($_POST["title"]))
    	{
    		$this->model->addEvent($_POST['title'], $_POST['start'], $_POST['end']);
    	}
    }
    
    public function delete() {
    	if(isset($_POST["id"]))
    	{
    		$this->model->deleteEvent($_POST["id"]);
    	}
    }
    
    public function update() {
    	if(isset($_POST["id"])){
    		$this->model->updateEvent($_POST["id"], $_POST["title"], $_POST["start"], $_POST["end"]);	
    	}
    }

}
