
<h1>create articles</h1>

<form action="/articles/update" method="post">
    <input type="hidden" name="id" value="<?=$articles->id;?>">
    <div>
        <input type="text" name="name" value="<?=$articles->name;?>">
    </div>
    <div>
        <input type="text" name="body" value="<?=$articles->body;?>">
    </div>
    <button type="submit">update</button>
</form>

