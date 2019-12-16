<?php

 */
namespace Plugin\Search;

class Model{


    public static function getSearchResults($query){

        if (!$query) {
            return false;
        }

        $searchWords = explode(' ', $query);

        foreach ($searchWords as $searchWordKey => $searchWord) {
            if ($searchWord != '') {
                $nonEmptySearchWords[] = $searchWord;
            }
        }

        $searchWords = $nonEmptySearchWords;

        $getAllWidgetData = self::getAllWidgetData();

        if (!empty($getAllWidgetData)){

            $searchResults = Array();

            foreach ($getAllWidgetData as $widgetKey=>$widget){

                $text = self::getWidgetText($widget);

                $simplifiedText = \Ip\Internal\Text\Transliteration::transform(strtolower($text));

                foreach ($searchWords as $searchWord){
                    if (substr_count($simplifiedText, \Ip\Internal\Text\Transliteration::transform(strtolower($searchWord)))){
                        $result['pageId'] = $widget['pageId'];
                        $result['title'] = $widget['title'];
                        $result['url'] = ipHomeUrl().$widget['urlPath'];
                        $result['description'] = self::html2text($text);
                        $searchResults[] = $result;
                    }
                }
            }


            $searchResults = self::filterUniquePageIds($searchResults);

            return $searchResults;
        }

    }

   
     */
    private static function filterUniquePageIds($searchResults){
        $pageIds = array();

        $searchResults = array_filter($searchResults, function($el) use (&$pageIds) {
            if (in_array($el['pageId'], $pageIds)) { 
                return false; 
            } else {
                $pageIds[] = $el['pageId']; 
                return true;
            }
        });

        return $searchResults;
    }

    private static function getWidgetText($widget){
        $widgetValue = json_decode($widget['data'], true);

        switch ($widget['name']){
            case 'Heading':
                $text = empty($widgetValue['title']) ? '' : $widgetValue['title'];
                break;
            case 'Text':
                $text = empty($widgetValue['text']) ? '' : $widgetValue['text'];
                break;
            default:
                $text = '';
                $textValues = array('text', 'title', 'heading');
                foreach($textValues as $key) {
                    if (!empty($widgetValue[$key])) {
                        $text .= $widgetValue[$key];
                    }
                }
            break;
        }
        return $text;
    }

    private static function html2text($html){

        try {
            $text = Html2Text::convert(htmlspecialchars_decode($html));
        } catch (Html2TextException $e) {
            $text = '';
        }
        $text = str_replace('[', ' ', $text);
        $text = str_replace(']', ' ', $text);

        return $text;
    }

    public static function getAllWidgetData()
    {

        $langCode = ipContent()->getCurrentLanguage()->getCode();

        $sql =
            'select distinct p.id as pageId, p.title as title, p.urlPath as urlPath, w.name as name, w.data as data from '.ipTable('page').' as p
            left join '.ipTable('revision').' as r on p.Id=r.pageId
            left join '.ipTable('widget').' as w on r.revisionId=w.revisionId
            where
                w.isVisible = 1 and
                w.isDeleted = 0 and
                r.isPublished=1 and
                p.isVisible=1 and
                p.isDisabled=0 and
                p.isSecured=0 and
                p.isDeleted=0 and
                p.urlPath<>"" and
                p.languageCode="'.$langCode.'"';
        $ra = ipDb()->fetchAll($sql);
        return $ra;

    }

    public static function getSearchBoxForm($query='')
    {
        $useGet = ipGetOption('Search.useGet');


        /**
         * @var $form \Ip\Form
         */
        $form = new \Ip\Form();

        $form->addClass($useGet ? 'ipsGet' : 'ipsUrl');

        if ($useGet) {
            $form->setMethod(\Ip\Form::METHOD_GET);
            $form->setAction(ipRouteUrl('Search'));
        }

        $field = new \Ip\Form\Field\Text(
            array(
                'name' => 'q',
                'label' => __('Search:', 'Search', false),
                'value' => $query
            ));
        $form->addField($field);
//
        $field = new \Ip\Form\Field\Submit(
            array(
                'value' => __('Search', 'Search', false)
            ));
        $form->addField($field);



        $form->setAction(ipRouteUrl('Search'));
        $form->setMethod('get');

        $form->setAjaxSubmit(false);
        $form->removeCsrfCheck();
        $form->removeSpamCheck();

        return $form;
    }

}
