<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="docs">
        <?php
            $docObj = new DocxConversion("../Files2read/T5_docs.docx");
            echo $docText= $docObj->convertToText();
        ?>
    </div>
    <a class="back" href="../index.php">Back</a>
</body>
</html>

<?php
class DocxConversion{
    private $filename;

    /* Function to know this is docs file. */
    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    //Reading function to read line by line
    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline) {
            $pos = strpos($thisline, chr(0x00));
            if (($pos == false)||(strlen($thisline)!==0)) {
                $outtext .= $thisline." ";
            }
        }
        $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext). "<br>";
        return $outtext;
    }

    //function to read docx file
    private function read_docx(){

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);
        /* if there is no docx file, 
         * return false coz there is nothing to read 
         */
        if (!$zip || is_numeric($zip)) {
            return false;
        } 
        /* entering while loop to read docs file
         * by extracting zip file to extract 
         * texts from word file
         */
        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == false) {
                continue;
            }
            if (zip_entry_name($zip_entry) != "word/document.xml") {
                continue;
            }
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            zip_entry_close($zip_entry);
        }

        zip_close($zip);
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }
    /* function to convert doc or docx file to txt 
     * to be able to read by php
     */
    public function convertToText() {
        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }
        //if extension of file is doc or docx, read file
        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } elseif($file_ext == "docx") {
                return $this->read_docx();
            }
        } else {
            return "Invalid File Type";
        }
    }
}
?>