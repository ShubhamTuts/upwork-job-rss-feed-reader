<html>
    <head>
        <title>RSS Feed Reader</title>	

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
.a {
    color: #007bff;
    text-decoration: none;
    padding: 20px 20px 20px 20px;
    margin: 5px 5px 5px 5px;
    background-color: white;
    font-size: 22px;
}
</style>

    <body style="background: wheat; width: 80%; margin-left: auto; margin-right: auto;>
        <?php
        //Feed URLs
        $feeds = array(
            "https://www.upwork.com/ab/feed/topics/rss?securityToken=66ebac527f00f1db30c3adbde8f0fe1f28b85f093f38240d6bf94dc1505e7a424d9c9fb9c6bba556d51e79070814a7bfcb292f0dff08eb81e32f946d93deef3d&userUid=1157095484389019648&orgUid=1157095484389019650&topic=6040914",
            
        );
        
        //Read each feed's items
        $entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $entries = array_merge($entries, $xml->xpath("//item"));
        }
        
        //Sort feed entries by pubDate
        usort($entries, function ($feed1, $feed2) {
            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
        });
        
        ?>
        
        <div style="background: green; padding: 10px"><?php
        //Print all the entries
        foreach($entries as $entry){
            ?>
            <button type="button" class="btn btn-success" style="margin: 20px; padding; 10px;> <a style="font-size: 20px; weight: 500 font-family: monterent;" href="<?= $entry->link ?>"><?= $entry->title ?></a> (<?= parse_url($entry->link)['host'] ?>)
            <?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
      <?= $entry->description ?></button>
            <?php
        }
        ?>
        </div>

<script type=”text/javascript”>
setInterval(‘location.reload()’, 3);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    </body>
</html>