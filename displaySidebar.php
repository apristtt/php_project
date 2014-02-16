            <div class="col-lg-3">
                <h4>Site Management</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                        <a href="createNews.php">
                            <button type="button" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Create News
                            </button>
                        </a>
                        </div>
                        <div class="form-group">
                        <?
                            $queryTotalHiddenNews = mysql_query("SELECT * FROM News WHERE NewsHidden = 1") or die(mysql_error());
                            $numTotalHiddenNews = mysql_num_rows($queryTotalHiddenNews);
                        ?>
                        <a href="viewHiddenNews.php">
                            <button type="button" class="btn btn-warning">
                                <span class="glyphicon glyphicon-eye-open"></span> <span class="badges"><? echo $numTotalHiddenNews ?></span> Hidden News
                            </button>
                        </a>
                        </div>
                    </div>
                </div>

                <h4>Recent News</h4>
                <div class="list-group">

                    <?php
                        $resultRecentNews = mysql_query("SELECT * FROM News WHERE NewsPinned = 0 AND NewsHidden = 0 ORDER by NewsID DESC") or die(mysql_error());

                        while($queryRecentNews = mysql_fetch_array($resultRecentNews)) {
                            echo "<a href='readNews.php?NewsID=$queryRecentNews[NewsID]' class='list-group-item'>".
                            "<p class='list-group-item-text'>$queryRecentNews[NewsTitle]</p></a>";
                        }

                    ?>
                    
                </div>

                <h4>Pinned News</h4>
                <div class="list-group">

                    <?php
                        $resultPinnedNews = mysql_query("SELECT * FROM News WHERE NewsPinned = 1 AND NewsHidden = 0 ORDER by NewsID DESC") or die(mysql_error());

                        while($queryPinnedNews = mysql_fetch_array($resultPinnedNews)) {
                            echo "<a href='readNews.php?NewsID=$queryPinnedNews[NewsID]' class='list-group-item'>".
                            "<p class='list-group-item-text'>$queryPinnedNews[NewsTitle]</p></a>";
                        }

                    ?>
                    
                </div>
            </div>