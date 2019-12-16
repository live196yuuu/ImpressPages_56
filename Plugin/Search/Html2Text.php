<?php


namespace Plugin\Search;


class Html2TextException extends \Exception {
    var $more_info;

    public function __construct($message = "", $more_info = "") {
        parent::__construct($message);
        $this->more_info = $more_info;
    }
}

class Html2Text
{

     *
     * @param string html the input HTML
     * @return string the HTML converted, as best as possible, to text
     * @throws Html2TextException if the HTML could not be loaded as a {@link \DOMDocument}
     */
    public static function convert($html, $partial = null)
    {
        if ($partial || $partial === null && mb_strpos($html, '<html ') === false) {
            $html = '<html lang="en"><head><meta charset="UTF-8" /></head><body>' . $html .'</body>';
        }

        if (empty($html)) {
            return '';
        }
        $html = self::fix_newlines($html);

        $doc = new \DOMDocument();
        $prevValue = libxml_use_internal_errors(true);
        $loaded = $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_use_internal_errors($prevValue);
        if (!$loaded) {
            throw new Html2TextException("Could not load HTML - badly formed?", $html);
        }
        $output = self::iterate_over_node($doc);


        $output = preg_replace("/[ \t]*\n[ \t]*/im", "\n", $output);


        $output = trim($output);

        return $output;
    }




    protected static function fix_newlines($text) {
      
        $text = str_replace("\r\n", "\n", $text);
  
        $text = str_replace("\r", "\n", $text);

        return $text;
    }

    protected static function next_child_name($node) {
       
        $nextNode = $node->nextSibling;
        while ($nextNode != null) {
            if ($nextNode instanceof DOMElement) {
                break;
            }
            $nextNode = $nextNode->nextSibling;
        }
        $nextName = null;
        if ($nextNode instanceof DOMElement && $nextNode != null) {
            $nextName = mb_strtolower($nextNode->nodeName);
        }

        return $nextName;
    }
    protected static function prev_child_name($node) {
       
        $nextNode = $node->previousSibling;
        while ($nextNode != null) {
            if ($nextNode instanceof DOMElement) {
                break;
            }
            $nextNode = $nextNode->previousSibling;
        }
        $nextName = null;
        if ($nextNode instanceof DOMElement && $nextNode != null) {
            $nextName = mb_strtolower($nextNode->nodeName);
        }

        return $nextName;
    }

    protected static function iterate_over_node($node) {
        if ($node instanceof \DOMText) {
            return preg_replace("/[\\t\\n\\v\\f\\r ]+/im", " ", $node->wholeText);
        }
        if ($node instanceof \DOMDocumentType) {
           
            return "";
        }

        $nextName = self::next_child_name($node);
        $prevName = self::prev_child_name($node);

        $name = mb_strtolower($node->nodeName);

      
        switch ($name) {
            case "hr":
                return "------\n";

            case "style":
            case "head":
            case "title":
            case "meta":
            case "script":
              
                return "";

            case "h1":
            case "h2":
            case "h3":
            case "h4":
            case "h5":
            case "h6":
               
                $output = "\n";
                break;

            case "p":
            case "div":
               
                $output = "\n";
                break;

            default:
               
                $output = "";
                break;
        }

       

        if (isset($node->childNodes)) {
            for ($i = 0; $i < $node->childNodes->length; $i++) {
                $n = $node->childNodes->item($i);

                $text = self::iterate_over_node($n);

                $output .= $text;
            }
        }

     
        switch ($name) {
            case "style":
            case "head":
            case "title":
            case "meta":
            case "script":
              
                return "";

            case "h1":
            case "h2":
            case "h3":
            case "h4":
            case "h5":
            case "h6":
                $output .= "\n";
                break;

            case "p":
            case "br":
            
                if ($nextName != "div")
                    $output .= "\n";
                break;

            case "div":
              
                if ($nextName != "div" && $nextName != null)
                    $output .= "\n";
                break;

            case "a":
               
                $href = $node->getAttribute("href");
                if ($href == null) {
                  
                    if ($node->getAttribute("name") != null) {
                        $output = "[$output]";
                    }
                } else {
                    if ($href == $output || $href == "mailto:$output" || $href == "http://$output" || $href == "https://$output") {
                   
                        $output;
                    } else {
                       
                        $output = "[$output]($href)";
                    }
                }

              
                switch ($nextName) {
                    case "h1": case "h2": case "h3": case "h4": case "h5": case "h6":
                    $output .= "\n";
                    break;
                }

            default:
        
        }

        return $output;
    }


}



