
<h1>articles</h1>
<?php foreach ($articles as $article):?>
    <h2><a href="/article?id=<?=$article['id'];?>"><?=$article['name'];?></a></h2>
    <h3><?=$article['body'];?></h3>
    <a href="/articles/edit?id=<?=$article['id'];?>">Edit</a>
    <a href="/articles/delete?id=<?=$article['id'];?>">delete</a>
<?php endforeach;?>

