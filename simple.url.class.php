    <?php
     
    /**
     * A clean url helper class, to process custom clean urls - Learn WebDev inc. Framework.
     *
     * @name SimpleURL Class - Learn WebDev inc. Framework
     * @author Kamal Nasser <support@learnwebdev.org>
     * @copyright Learn WebDev inc. 29/1/2011
     *
     * @version 2.0.0
     */
    class SimpleURL {
     
        /**
         * An array containing the URL segments.
         *
         * @access public
         * @var array
         */
            public $splitted_path = false;
        /**
         * A variable containing the default page name, specified in __construct()
         *
         * @see __construct()
         * @var string
         * @access public
         */
            public $defaultPage;
            private $_url;
     
        /**
         * Construct a new SimpleURL class.
         *
         * @param string $defaultPage Default page name if no page found.
         */
            public function __construct($root_url, $defaultPage){
                    $url = rtrim(ltrim(preg_replace("!{$root_url}!", '', urldecode($_SERVER['REQUEST_URI'])), '/'), '/');
                    $this->_url = $url;
                    $this->splitted_path = explode('/', $url);
                    if( $this->blank() ){
                            $this->splitted_path[0] = $defaultPage;
                    }
                    $this->defaultPage = $defaultPage;
            }
           
            /**
         * Check how many segments found in the URL.
         *
         * @return int How many segments found in the URL.  
         */
            public function count(){
                    return count($this->splitted_path);
            }
           
            /**
         * Check if no segments were found.
         *
         * @return boolean TRUE if no segments were found, FALSE if there were any segments.
         */
            public function blank(){
                    if( empty($this->_url) ){
                            return true;
                    }else {
                            return false;
                    }
            }
           
            /**
         * Get the string path, example: products/categories/toys
         *
         * @return string Full string path
         */
            public function __toString(){
                    return implode('/', $this->splitted_path);
            }
           
            /**
         * Get the ($index)th segment.
         *
         * @param int $index The index of the segment.
         * @return The ($index)th segment, or FALSE.
         */
            public function segment($index){
                    if($this->splitted_path === false){
                            return false;
                    }
                    if($index === false){
                            return $this->splitted_path;
                    }
                    if(isset($this->splitted_path[$index]) === true){
                            return $this->splitted_path[$index];
                    }else {
                            return false;
                    }
            }
    }
