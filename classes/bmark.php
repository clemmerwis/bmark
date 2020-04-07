<?php 
class Bmark {
    protected $json_string;
    protected $bmark_asArr;
    protected $opts;

    public function __construct(array $opts)
    {
        $this->json_string = $this->get_json_from_file();
        $this->bmark_asArr = $this->get_bmark_asArr();
        $this->opts = $opts;
        $this->addCategory_newPair();
    }

    public function get_json_from_file()
    {
        if (!is_file("bmark.json"))
        {
            // create json file
            $fh = fopen("bmark.json", 'w+') or die("can't open file");
            $bmark = array(
                "Category" => array(
                    "Name" => "https://www.theurl.com"
                ) 
            ); 
            $bmark_json = json_encode($bmark);
            fwrite($fh, $bmark_json); 
            fclose($fh);
        }
        $jsonstring = file_get_contents("bmark.json");
        return $jsonstring;
    }

    public function get_json_string()
    {
        return $this->json_string;
    }

    public function get_bmark_asArr() 
    {
        $jsonstring = $this->get_json_string();
        $bmark = json_decode($jsonstring, true);
        return $bmark;
    }

    public function set_bmark($val)
    {
        $this->bmark_asArr = $val;
    }

    public function get_bmark()
    {
        return $this->bmark_asArr;
    }

    public function get_opts()
    {
        return $this->opts;
    }

    public function write_jsonFile()
    {
        $bmark = $this->get_bmark();
        // create json file
        $fh = fopen("bmark.json", 'w+') or die("can't open file"); 
        $bmark_json = json_encode($bmark);
        fwrite($fh, $bmark_json); 
        fclose($fh);
    }

    public function category_exists($optc, $bmark)
    {
        $keys = array_keys($bmark);
        foreach ($keys as $key)
        {
            if ($key === $optc)
            {
                $keyBool = true;
                break;
            }
            else
            {
                $keyBool = false;
            }
        }        
        return $keyBool;
    }

    public function addCategory_newPair()
    {
        $opts = $this->get_opts();
        $bmark = $this->get_bmark();
        if ($this->category_exists($opts["c"], $bmark)) 
        {
            $bmark[$opts["c"]][$opts["n"]] = $opts["u"];
        }
        else
        {
            $bmark[$opts["c"]] = array($opts["n"] => $opts["u"]);
        }
        $this->set_bmark($bmark);
        $this->write_jsonFile();
    }
}

?>
