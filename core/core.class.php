<?php

class Core
{
    private static function config ()
    {
        require_once 'db.class.php';
        
        $db = new DB('localhost', 'root', 'Hgv5MN4k');
        $db->dbConnection('forum');
        
        $forum['categ'] = $db->getRow('category', 1);
        $forum['forum'] = $db->getRow('forum', $forum['categ']['id']);
        $forum['topic'] = $db->getRow('topic', $forum['forum']['id']);
        $forum['message'] = $db->getRow('message' $forum['topic']['id']);
        echo $forum['categ']['name'].'<br>';
        echo $forum['categ']['description'].'<br>';
        echo $forum['forum']['name'].'<br>';
        echo $forum['forum']['description'].'<br>';
        echo $forum['topic']['name'].'<br>';
        echo $forum['message']['name'].'<br>';
        echo $forum['message']['message'].'<br>';
        
    }
    
    public static function run()
    {
        self::config();
    }
}

?>