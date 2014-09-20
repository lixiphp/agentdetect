<?php

namespace Lixiphp;

class AgentDetect {

    var $agent		= NULL;

    var $is_browser	= FALSE;
    var $is_robot	= FALSE;
    var $is_mobile	= FALSE;

    var $languages	= array();
    var $charsets	= array();

    var $platforms	= array (
        'windows nt 6.0'	=> 'Windows Longhorn',
        'windows nt 5.2'	=> 'Windows 2003',
        'windows nt 5.0'	=> 'Windows 2000',
        'windows nt 5.1'	=> 'Windows XP',
        'windows nt 4.0'	=> 'Windows NT 4.0',
        'winnt4.0'			=> 'Windows NT 4.0',
        'winnt 4.0'			=> 'Windows NT',
        'winnt'				=> 'Windows NT',
        'windows 98'		=> 'Windows 98',
        'win98'				=> 'Windows 98',
        'windows 95'		=> 'Windows 95',
        'win95'				=> 'Windows 95',
        'windows'			=> 'Windows',
        'os x'				=> 'Mac OS X',
        'ppc mac'			=> 'Power PC Mac',
        'freebsd'			=> 'FreeBSD',
        'ppc'				=> 'Macintosh',
        'linux'				=> 'Linux',
        'debian'			=> 'Debian',
        'sunos'				=> 'Sun Solaris',
        'beos'				=> 'BeOS',
        'apachebench'		=> 'ApacheBench',
        'aix'				=> 'AIX',
        'irix'				=> 'Irix',
        'osf'				=> 'DEC OSF',
        'hp-ux'				=> 'HP-UX',
        'netbsd'			=> 'NetBSD',
        'bsdi'				=> 'BSDi',
        'openbsd'			=> 'OpenBSD',
        'gnu'				=> 'GNU/Linux',
        'unix'				=> 'Unix'
    );
    var $operatingSystems = array(
        '\biPhone.*Mobile|\biPod|\biPad' => 'IOS',
        'android' => 'AndroidOS',
        'blackberry|\bBB10\b|rim tablet os' => 'BlackBerryOS',
        'PalmOS|avantgo|blazer|elaine|hiptop|palm|plucker|xiino' => 'PalmOS',
        'Symbian|SymbOS|Series60|Series40|SYB-[0-9]+|\bS60\b' => 'SymbianOS',
        'Windows CE.*(PPC|Smartphone|Mobile|[0-9]{3}x[0-9]{3})|Window Mobile|Windows Phone [0-9.]+|WCE;' => 'WindowsOS',
        'Windows Phone 8.0|Windows Phone OS|XBLWP7|ZuneWP7|Windows NT 6.[23]; ARM;' => 'WindowsOS',
        'MeeGo' => 'MeeGoOS',
        'Maemo' => 'MaemoOS',
        'J2ME/|\bMIDP\b|\bCLDC\b' => 'JavaOS',
        'webOS|hpwOS' => 'webOS',
        '\bBada\b' => 'badaOS',
        'BREW' => 'BREWOS',
    );
    var $browsers	= array(
        'Flock'				=> 'Flock',
        'Chrome'			=> 'Chrome',
        'Opera'				=> 'Opera',
        'MSIE'				=> 'Internet Explorer',
        'Internet Explorer'	=> 'Internet Explorer',
        'Shiira'			=> 'Shiira',
        'Firefox'			=> 'Firefox',
        'Chimera'			=> 'Chimera',
        'Phoenix'			=> 'Phoenix',
        'Firebird'			=> 'Firebird',
        'Camino'			=> 'Camino',
        'Netscape'			=> 'Netscape',
        'OmniWeb'			=> 'OmniWeb',
        'Safari'			=> 'Safari',
        'Mozilla'			=> 'Mozilla',
        'Konqueror'			=> 'Konqueror',
        'icab'				=> 'iCab',
        'Lynx'				=> 'Lynx',
        'Links'				=> 'Links',
        'hotjava'			=> 'HotJava',
        'amaya'				=> 'Amaya',
        'IBrowse'			=> 'IBrowse'
    );
    var $mobiles	= array(
        // legacy array, old values commented out
        'mobileexplorer'	=> 'Mobile Explorer',
        'palmsource'		=> 'Palm',
        'palmscape'			=> 'Palmscape',
        // Phones and Manufacturers
        'nexus'             => 'Nexus',
        'kindle'            => 'Kindle',
        'galaxy'            => 'Galaxy',
        'gt-'               => 'Galaxy',
        'motorola'			=> "Motorola",
        'nokia'				=> "Nokia",
        'palm'				=> "Palm",
        'iphone'			=> "iPhone",
        'ipad'				=> "iPad",
        'ipod'				=> "iPod Touch",
        'sony'				=> "Sony Ericsson",
        'ericsson'			=> "Sony Ericsson",
        'blackberry'		=> "BlackBerry",
        'cocoon'			=> "O2 Cocoon",
        'blazer'			=> "Treo",
        'lg'				=> "LG",
        'amoi'				=> "Amoi",
        'xda'				=> "XDA",
        'mda'				=> "MDA",
        'vario'				=> "Vario",
        'htc'				=> "HTC",
        'samsung'			=> "Samsung",
        'sharp'				=> "Sharp",
        'sie-'				=> "Siemens",
        'alcatel'			=> "Alcatel",
        'benq'				=> "BenQ",
        'ipaq'				=> "HP iPaq",
        'mot-'				=> "Motorola",
        'playstation portable'	=> "PlayStation Portable",
        'hiptop'			=> "Danger Hiptop",
        'nec-'				=> "NEC",
        'panasonic'			=> "Panasonic",
        'philips'			=> "Philips",
        'sagem'				=> "Sagem",
        'sanyo'				=> "Sanyo",
        'spv'				=> "SPV",
        'zte'				=> "ZTE",
        'sendo'				=> "Sendo",

        // Operating Systems
        'symbian'				=> "Symbian",
        'SymbianOS'				=> "SymbianOS",
        'elaine'				=> "Palm",
        'series60'				=> "Symbian S60",
        'windows ce'			=> "Windows CE",

        // Browsers
        'obigo'					=> "Obigo",
        'netfront'				=> "Netfront Browser",
        'openwave'				=> "Openwave Browser",
        'mobilexplorer'			=> "Mobile Explorer",
        'operamini'				=> "Opera Mini",
        'opera mini'			=> "Opera Mini",

        // Other
        'digital paths'			=> "Digital Paths",
        'avantgo'				=> "AvantGo",
        'xiino'					=> "Xiino",
        'novarra'				=> "Novarra Transcoder",
        'vodafone'				=> "Vodafone",
        'docomo'				=> "NTT DoCoMo",
        'o2'					=> "O2",

        // Fallback
        'mobile'				=> "",
        'wireless'				=> "",
        'j2me'					=> "",
        'midp'					=> "",
        'cldc'					=> "",
        'up.link'				=> "",
        'up.browser'			=> "",
        'smartphone'			=> "",
        'cellphone'				=> ""
    );
    var $robots		= array(
        'baiduspider'		=> 'BaiduSpider',
        'sosospider'		=> 'SosoSpider',
        'yyspider'		    => 'YYSpider',
        'sougou'		    => 'SogouSpider',
        'bingbot'			=> 'Bingbot',
        'googlebot'			=> 'Googlebot',
        'msnbot'			=> 'MSNBot',
        'slurp'				=> 'Inktomi Slurp',
        'yahoo'				=> 'Yahoo',
        'askjeeves'			=> 'AskJeeves',
        'fastcrawler'		=> 'FastCrawler',
        'infoseek'			=> 'InfoSeek Robot 1.0',
        'lycos'				=> 'Lycos'
    );

    var $platform	= '';
    var $browser	= '';
    var $version	= '';
    var $mobile		= '';
    var $robot		= '';
    var $os		    = '';

    /**
     * Constructor
     *
     * Sets the User Agent and runs the compilation routine
     *
     * @access	public
     * @return	void
     */
    public function __construct()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            $this->agent = trim($_SERVER['HTTP_USER_AGENT']);
        }

        if ( ! is_null($this->agent))
        {
            $this->_compile_data();
        }
    }

    // --------------------------------------------------------------------

    /**
     * Compile the User Agent Data
     *
     * @access	private
     * @return	bool
     */
    private function _compile_data()
    {
        $this->_set_platform();
        $this->_set_os();

        foreach (array('_set_robot', '_set_browser', '_set_mobile') as $function)
        {
            if ($this->$function() === TRUE)
            {
                break;
            }
        }
    }

    // --------------------------------------------------------------------

    /**
     * Set the Platform
     *
     * @access	private
     * @return	mixed
     */
    private function _set_platform()
    {
        if (is_array($this->platforms) AND count($this->platforms) > 0)
        {
            foreach ($this->platforms as $key => $val)
            {
                if (preg_match("|".preg_quote($key)."|i", $this->agent))
                {
                    $this->platform = $val;
                    return TRUE;
                }
            }
        }
        $this->platform = '';
    }

    // --------------------------------------------------------------------

    /**
     * Set the OS
     *
     * @access	private
     * @return	mixed
     */
    private function _set_os()
    {
        if (is_array($this->operatingSystems) AND count($this->operatingSystems) > 0)
        {
            foreach ($this->operatingSystems as $key => $val)
            {
                if (preg_match("#".$key."#i", $this->agent))
                {
                    $this->os = $val;
                    return TRUE;
                }
            }
        }
        $this->os = '';
    }

    // --------------------------------------------------------------------

    /**
     * Set the Browser
     *
     * @access	private
     * @return	bool
     */
    private function _set_browser()
    {
        if (is_array($this->browsers) AND count($this->browsers) > 0)
        {
            foreach ($this->browsers as $key => $val)
            {
                if (preg_match("|".preg_quote($key).".*?([0-9\.]+)|i", $this->agent, $match))
                {
                    $this->is_browser = TRUE;
                    $this->version = $match[1];
                    $this->browser = $val;
                    $this->_set_mobile();
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Robot
     *
     * @access	private
     * @return	bool
     */
    private function _set_robot()
    {
        if (is_array($this->robots) AND count($this->robots) > 0)
        {
            foreach ($this->robots as $key => $val)
            {
                if (preg_match("|".preg_quote($key)."|i", $this->agent))
                {
                    $this->is_robot = TRUE;
                    $this->robot = $val;
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Mobile Device
     *
     * @access	private
     * @return	bool
     */
    private function _set_mobile()
    {
        if (is_array($this->mobiles) AND count($this->mobiles) > 0)
        {
            foreach ($this->mobiles as $key => $val)
            {
                if (FALSE !== (strpos(strtolower($this->agent), $key)))
                {
                    $this->is_mobile = TRUE;
                    $this->mobile = $val;
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * Set the accepted languages
     *
     * @access	private
     * @return	void
     */
    private function _set_languages()
    {
        if ((count($this->languages) == 0) AND isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) AND $_SERVER['HTTP_ACCEPT_LANGUAGE'] != '')
        {
            $languages = preg_replace('/(;q=[0-9\.]+)/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])));

            $this->languages = explode(',', $languages);
        }

        if (count($this->languages) == 0)
        {
            $this->languages = array('Undefined');
        }
    }

    // --------------------------------------------------------------------

    /**
     * Set the accepted character sets
     *
     * @access	private
     * @return	void
     */
    private function _set_charsets()
    {
        if ((count($this->charsets) == 0) AND isset($_SERVER['HTTP_ACCEPT_CHARSET']) AND $_SERVER['HTTP_ACCEPT_CHARSET'] != '')
        {
            $charsets = preg_replace('/(;q=.+)/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_CHARSET'])));

            $this->charsets = explode(',', $charsets);
        }

        if (count($this->charsets) == 0)
        {
            $this->charsets = array('Undefined');
        }
    }

    // --------------------------------------------------------------------

    /**
     * Is Browser
     *
     * @access	public
     * @return	bool
     */
    public function is_browser($key = NULL)
    {
        if ( ! $this->is_browser)
        {
            return FALSE;
        }

        // No need to be specific, it's a browser
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific browser
        return array_key_exists($key, $this->browsers) AND $this->browser === $this->browsers[$key];
    }

    // --------------------------------------------------------------------

    /**
     * Is Robot
     *
     * @access	public
     * @return	bool
     */
    public function is_robot($key = NULL)
    {
        if ( ! $this->is_robot)
        {
            return FALSE;
        }

        // No need to be specific, it's a robot
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific robot
        return array_key_exists($key, $this->robots) AND $this->robot === $this->robots[$key];
    }

    // --------------------------------------------------------------------

    /**
     * Is Mobile
     *
     * @access	public
     * @return	bool
     */
    public function is_mobile($key = NULL)
    {
        if ( ! $this->is_mobile)
        {
            return FALSE;
        }

        // No need to be specific, it's a mobile
        if ($key === NULL)
        {
            return TRUE;
        }

        // Check for a specific robot
        return array_key_exists($key, $this->mobiles) AND $this->mobile === $this->mobiles[$key];
    }

    // --------------------------------------------------------------------

    /**
     * Is this a referral from another site?
     *
     * @access	public
     * @return	bool
     */
    public function is_referral()
    {
        if ( ! isset($_SERVER['HTTP_REFERER']) OR $_SERVER['HTTP_REFERER'] == '')
        {
            return FALSE;
        }
        return TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * Agent String
     *
     * @access	public
     * @return	string
     */
    public function agent_string()
    {
        return $this->agent;
    }

    // --------------------------------------------------------------------

    /**
     * Get Platform
     *
     * @access	public
     * @return	string
     */
    public function platform()
    {
        return $this->platform;
    }

    // --------------------------------------------------------------------

    /**
     * Get Browser Name
     *
     * @access	public
     * @return	string
     */
    public function browser()
    {
        return $this->browser;
    }

    // --------------------------------------------------------------------

    /**
     * Get OS Name
     *
     * @access	public
     * @return	string
     */
    public function os()
    {
        return $this->os;
    }

    // --------------------------------------------------------------------

    /**
     * Get the Browser Version
     *
     * @access	public
     * @return	string
     */
    public function version()
    {
        return $this->version;
    }

    // --------------------------------------------------------------------

    /**
     * Get The Robot Name
     *
     * @access	public
     * @return	string
     */
    public function robot()
    {
        return $this->robot;
    }
    // --------------------------------------------------------------------

    /**
     * Get the Mobile Device
     *
     * @access	public
     * @return	string
     */
    public function mobile()
    {
        return $this->mobile;
    }

    // --------------------------------------------------------------------

    /**
     * Get the referrer
     *
     * @access	public
     * @return	bool
     */
    public function referrer()
    {
        return ( ! isset($_SERVER['HTTP_REFERER']) OR $_SERVER['HTTP_REFERER'] == '') ? '' : trim($_SERVER['HTTP_REFERER']);
    }

    // --------------------------------------------------------------------

    /**
     * Get the accepted languages
     *
     * @access	public
     * @return	array
     */
    public function languages()
    {
        if (count($this->languages) == 0)
        {
            $this->_set_languages();
        }

        return $this->languages;
    }

    // --------------------------------------------------------------------

    /**
     * Get the accepted Character Sets
     *
     * @access	public
     * @return	array
     */
    public function charsets()
    {
        if (count($this->charsets) == 0)
        {
            $this->_set_charsets();
        }

        return $this->charsets;
    }

    // --------------------------------------------------------------------

    /**
     * Test for a particular language
     *
     * @access	public
     * @return	bool
     */
    public function accept_lang($lang = 'en')
    {
        return (in_array(strtolower($lang), $this->languages(), TRUE));
    }

    // --------------------------------------------------------------------

    /**
     * Test for a particular character set
     *
     * @access	public
     * @return	bool
     */
    public function accept_charset($charset = 'utf-8')
    {
        return (in_array(strtolower($charset), $this->charsets(), TRUE));
    }
}
