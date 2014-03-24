<?php
class BlogView {
	/**
	 * Holds variables assigned to template
	 */
	private $data;
	private $blogPage;
	private $comments;

	/**
	 * Holds render status of view
	 */
	private $render = FALSE;
	private $header = FALSE;
	private $footer = FALSE;
	private $nav = FALSE;

	public function __construct($template, $header, $footer, $nav) {
		if (file_exists($template)) {
			$this -> render = $template;
		}
		if (file_exists($header)) {
			$this -> header = $header;
		}
		if (file_exists($footer)) {
			$this -> footer = $footer;
		}
		if (file_exists($nav)) {
			$this -> nav = $nav;
		}
	}

	public function assign($data, $comments, $userDetails) {
		$this -> data = $data;
		$this -> comments = $comments;
		$this -> userDetails = $userDetails;
	}

	public function __destruct() {
		$data = $this -> data;
		$blogPage = $this -> blogPage;
		$comments = $this -> comments;
		$userDetails = $this -> userDetails;
		include_once ($this -> header);
		include_once ($this -> nav);
		include_once ($this -> render);
		include_once ($this -> footer);
	}

}
