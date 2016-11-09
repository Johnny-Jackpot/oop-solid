<?php

class Publication {
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author_name;
    public $type;
    
    function __construct($row) {
        $this->id = $row["id"];
        $this->title = $row["title"];
        $this->date = $row["date"];
        $this->short_content = $row["short_content"];
        $this->content = $row["content"];
        $this->preview = $row["preview"];
        $this->author_name = $row["author_name"];
        $this->type = $row["type"];
    }
}

class NewsPublication extends Publication {
    public function printItem() {
        //echo '<br> Method  ' . __METHOD__ . ' was called.';
        //echo '<br> This is news.';
        //echo '<hr>';
        echo '<br>News: ' . $this->title;
        echo '<br>Data: ' . $this->date;
        echo '<hr>';
    }
}

class ArticlePublication extends Publication {
    public function printItem() {
       // echo '<br> Method  ' . __METHOD__ . ' was called.';
       // echo '<br> This is article.';
        //echo '<hr>';
        echo '<br>Article: ' . $this->title;
        echo '<br>Author: ' . $this->author_name;
        echo '<hr>';
    }
}

class PhotoReportPublication extends Publication {
    public function printItem() {
        //echo '<br> Method  ' . __METHOD__ . '  was called.';
        //echo '<br> This is photo report.';
        //echo '<hr>';
        echo '<br>Photo report : ' . $this->title;
        echo '<br><img src="http://localhost/test2/' . $this->preview . '">';
        echo '<hr>';
    }
}


?>