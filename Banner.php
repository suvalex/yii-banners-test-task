<?php

// shows banners
class Banner extends CWidget{
	
	const TEST_MODE = true;
		
	// default count of shows
	const DEFAULT_SHOW_CNT = 50;
	
	// how many banners to show in percentage from unshown
	public $percentage;
	
	// name of banner template
	public $template;
	
	// countdown for shows of each banner name
	private static $counter = array("superbanner" => 50);
	
	// counter of all shown banners
	private static $id = 0;
	
	public function init(){
		// set default count of shows if !isset
		if(!isset(self::$counter[$this->template]))
			self::$counter[$this->template] = self::DEFAULT_SHOW_CNT;
		
		$left = self::$counter[$this->template];
		
		// if banners remain
		if($left != 0){
			// count of banners to show
			$to_show = (int)round($left * $this->percentage / 100);
			if($to_show > $left)
				$to_show = $left;
			self::$counter[$this->template] -= $to_show;

			for($i = 0; $i <= $to_show; $i++){
				// show banner from template
				$this->render('banners/' . $this->template, array(
					'id' => self::$id++
				));
			}
			
			if(self::TEST_MODE) 
				echo "'" . $this->template . "' showed: " . $to_show . ", remains: " . self::$counter[$this->template] . " banners";
			
			$this->registerClientScript();
		}
    }
	
	protected function registerClientScript(){
		// border for highlighted banner
		Yii::app()->clientScript->registerCss('highlight', '
			.highlight{border: 1px solid red;}
		');
		// scrolls page to necessary banner by id from hash
        Yii::app()->clientScript->registerScript('goToBannerId',"
		var banner = $(\"#banner-id-\" + window.location.hash.substr(1)).find('div');
		if(banner.length){
			$('html, body').animate({ 
				scrollTop: banner.offset().top - 100
			}, 700, function(){
				banner.css({borderColor:'red',borderStyle:'solid'}).animate({borderWidth : '3px'}, 100, 'linear');
			});
		}
		");
    }
}