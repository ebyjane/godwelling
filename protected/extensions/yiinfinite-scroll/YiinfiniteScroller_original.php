<?php

/**
 * This extension uses the infinite scroll jQuery plugin, from
 * http://www.infinite-scroll.com/ to create an infinite scrolling pagination,
 * like in twitter.
 *
 * It uses javascript to load and parse the new pages, but gracefully degrade
 * in cases where javascript is disabled and the users will still be able to
 * access all the pages.
 *
 * @author davi_alexandre
 * @author Charles R. Portwood II <charlesportwoodii@ethreal.net>
 */
class YiinfiniteScroller extends CBasePager {

    public $contentSelector = '#content';
	public $manualScroll = true;

    private $_options = array(
        'url'           => null,
        'debug'         => false,
        'defaultCallback'   => 'js:function(text, data) { }',
        'errorCallback'     => 'js:function() { $(".infinite_navigation").fadeOut(); }',     
        'loading' => array(
            'img'           => 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
            'finishedMsg'   => null,
            'msgText'       => 'Loading more content...',
            'selector'      => null,
            'speed'         => 'fast',
			'prefill'         => 'true',
        ),
        'param'  => array(
            'getParam'  => null,
            'param'     => null
        ),
        
    );

    private $_default_options = array(
        'navSelector'   => 'div.infinite_navigation a:first',
        'nextSelector'  => 'div.infinite_navigation a:first',
        'bufferPx'      => '300',
    );

    private $_callback = null;

    public function init()
    {
        $this->getPages()->validateCurrentPage = false;
        $this->_options['loadingImg'] = Yii::app()->baseUrl.'/images/infinite-loading.gif';
        parent::init();
    }

    public function run()
    {
        $this->registerClientScript();
        $this->createInfiniteScrollScript();
        $this->renderNavigation();

        if($this->getPages()->getPageCount() > 0 && $this->theresNoMorePages())
            throw new CHttpException(404);
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->_options))
            return $this->_options[$name];

        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if(array_key_exists($name, $this->_options))
        {
            return $this->_options[$name] = $value;
        }

        return parent::__set($name, $value);
    }

    public function registerClientScript() {
        $url = CHtml::asset(Yii::getPathOfAlias('ext.yiinfinite-scroll.assets').'/jquery.infinitescroll.min.js');
        Yii::app()->clientScript->registerScriptFile($url);
    }

    private function createInfiniteScrollScript()
    {
        Yii::app()->clientScript->registerScript(uniqid(), "$('{$this->contentSelector}').infinitescroll(".$this->buildInifiniteScrollOptions().");");
    }
	
/*private function createInfiniteScrollScript() {
        Yii::app()->clientScript->registerScript(
            uniqid(),
            "$('{$this->contentSelector}').infinitescroll(".$this->buildInifiniteScrollOptions().");"
        );
 
        if($this->manualScroll):
        Yii::app()->clientScript->registerScript(
              uniqid().'_manuala',
              "     //kill scroll binding
                $(window).unbind('.infscr');
 
                //hook up the manual click guy.
                $('a#{$this->nextButtonId}').live('click', function(){
                    $(document).trigger('retrieve.infscr');
 
//============ NOTE I HAVE ADDED THIS LINE, ADJUST THE DISPLAY CSS PROPERTY OF YOUR NEXT BUTTON===================
$('a#{$this->nextButtonId}').css('display','inline-block' );
                    return false;
                });
 
                // remove the paginator when we're done.
                $(document).ajaxError(function(e,xhr,opt){
                    if(xhr.status == 404) $('a#{$this->nextButtonId}').remove();
                });
              ",
              CClientScript::POS_LOAD
        );
        endif;
    }	*/

    private function buildInifiniteScrollOptions()
    {
        $options = array_merge($this->_options, $this->_default_options);
        $options = array_filter( $options );
        $options = CJavaScript::encode($options);
        return $options;
    }

    private function renderNavigation()
    {
        $next_link = CHtml::link('<strong style="width: 93px;">Load More</strong>
			<span></span>',$this->createPageUrl($this->getCurrentPage()+1), array('id' => 'more', 'escape' => true));
		//Yii::app()->clientScript->registerScript(uniqid() . 'bind-scroll', "$('#more').click(function(e) { e.preventDefault(); $('#posts').infinitescroll('retrieve'); $('#posts').infinitescroll('updateUrl'); });");        
		echo '<div class="infinite_navigation">'.$next_link.'</div>';
    }

    private function theresNoMorePages()
    {
        return $this->getPages()->getCurrentPage() >= $this->getPages()->getPageCount();
    }
    
    public function createPageUrl($id=1)
    {
        $queryParam = NULL;
        if (Cii::get($this->_options['param'], 'getParam', NULL) != NULL)
            $queryParam = '?' . Cii::get($this->_options['param'], 'getParam', NULL) . '=' . Cii::get($this->_options['param'], 'param', NULL);
        return '/dwel1/'.$this->_options['url'] .'/' . ($id+1) . $queryParam;
    }
}