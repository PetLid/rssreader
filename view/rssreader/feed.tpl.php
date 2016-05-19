<div class="rss-feed">
    <ul>

    <?php foreach($items as $key => $item) {
        echo "<li>
                <a href={$item->get_link()}>
                <div class='rss-item'>
                    <h2 class='title'>{$item->get_title()}</h2>
                    {$item->get_description()}
                    <p class='date'>
                        {$item->get_date('l dS ')} of {$item->get_date('M - Y')}
                    </p>
                  </div>
                </a>
              </li>";
    }?>

    </ul>
</div>
