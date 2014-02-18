                <?
                    $result = mysql_query("SELECT NewsID, NewsPinned, NewsHidden, NewsTitle, SUBSTRING(NewsContent, 1, 250) AS NewsContentSubString, NewsDate FROM News WHERE NewsPinned = 1 AND NewsHidden = 0 ORDER by NewsID DESC LIMIT 3") or die(mysql_error());
                    while ($query = mysql_fetch_array($result)){                    
                ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <? echo $query['NewsTitle'] ?> &ensp;
                                <? include ("displayNewsTools.php") ?>
                            <small class="pull-right">
                                Posted on <? echo $query['NewsDate'] ?>
                            </small>
                        </div>
                        <div class="panel-body">
                            <? echo $query['NewsContentSubString'] ?>
                        </div>
                        <div class="panel-footer">
                        <span class="label label-primary">0 Comments</span>
                            <a href="readNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                <small class='pull-right'>Read more &raquo;</small>
                            </a>
                        </div>
                    </div>
                <? } ?>
                <?
                    $result = mysql_query("SELECT NewsID, NewsPinned, NewsHidden, NewsTitle, SUBSTRING(NewsContent, 1, 250) AS NewsContentSubString, NewsDate FROM News WHERE NewsPinned = 0 AND NewsHidden = 0 ORDER by NewsID DESC") or die(mysql_error());
                    while ($query = mysql_fetch_array($result)){                    
                ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <? echo $query['NewsTitle'] ?> &ensp;
                                <? include ("displayNewsTools.php") ?>
                            <small class="pull-right">
                                Posted on <? echo $query['NewsDate'] ?>
                            </small>
                        </div>
                        <div class="panel-body">
                            <? echo $query['NewsContentSubString'] ?>
                        </div>
                        <div class="panel-footer">
                        <span class="label label-primary">0 Comments</span>
                            <a href="readNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                <small class='pull-right'>Read more &raquo;</small>
                            </a>
                        </div>
                    </div>
                <? } ?>