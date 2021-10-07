<div class="left">
    <h2>Scores</h2>
    <a href="?page=new">New match.</a>
</div>
<div class="right">
    <?php
    if (isset($match))
        foreach ($match->getSets() as $key => $set) {
            echo 'SET ' . ++$key . ' :';
            echo (string) $set;
        }
    ?>
</div>