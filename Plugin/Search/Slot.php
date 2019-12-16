<?php


namespace Plugin\Search;

class Slot {

    public static function searchBox($params)
    {
        $data['form'] = Model::getSearchBoxForm('');

        return ipView('view/searchBox.php', $data);
    }

    public static function searchResults($query)
    {
        $results = Model::getSearchResults($query);

        if (!empty($results)){

            $data['results'] = $results;
            return ipView('view/results.php', $data);
        }else{
            return ipView('view/noResults.php');
        }

    }

}
