
<?php 
class Sample
{
    /**
     * Returns whether we run on CLI or browser.
     *
     * @return bool
     */
    public function isCli()
    {
        return PHP_SAPI === 'cli';
    }

    /**
     * Return the filename currently being executed.
     *
     * @return string
     */
    public function getScriptFilename()
    {
        return basename($_SERVER['SCRIPT_FILENAME'], '.php');
    }

    /**
     * Whether we are executing the index page.
     *
     * @return bool
     */
    public function isIndex()
    {
        return $this->getScriptFilename() === 'index';
    }

    public function log($message)
    {
        $eol = $this->isCli() ? PHP_EOL : '<br />';
        echo date('H:i:s ') . $message . $eol;
    }
}
?>