            <div class="col-lg-3">
                <h4>News Management</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                        <a href="createContent.php">
                            <button type="button" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span> Create Content
                            </button>
                        </a>
                        </div>
                        <div class="form-group">
                        <a href="viewHiddenNews.php">
                            <button type="button" class="btn btn-warning">
                                <span class="glyphicon glyphicon-eye-open"></span> View Hidden News
                            </button>
                        </a>
                        </div>
                    </div>
                </div>

                <h4>Recent News</h4>
                <div class="list-group">

                    <?php
                        $resultRecentNews = mysql_query("SELECT * FROM News WHERE NewsPinned = 0 ORDER by NewsID DESC") or die(mysql_error());

                        while($queryRecentNews = mysql_fetch_array($resultRecentNews)) {
                            echo "<a href='readNews.php?NewsID=$queryRecentNews[NewsID]' class='list-group-item'>".
                            "<h4 class='list-group-item-heading'>$queryRecentNews[NewsTitle]</h4></a>";
                        }

                    ?>
                    
                </div>

                <h4>Pinned News</h4>
                <div class="list-group">

                    <?php
                        $resultPinnedNews = mysql_query("SELECT * FROM News WHERE NewsPinned = 1 ORDER by NewsID DESC") or die(mysql_error());

                        while($queryPinnedNews = mysql_fetch_array($resultPinnedNews)) {
                            echo "<a href='readNews.php?NewsID=$queryPinnedNews[NewsID]' class='list-group-item'>".
                            "<h4 class='list-group-item-heading'>$queryPinnedNews[NewsTitle]</h4></a>";
                        }

                    ?>
                    
                </div>
            </div>