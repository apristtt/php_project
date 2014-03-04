                <?
                    $result = mysql_query("SELECT News.NewsID, News.NewsPinned, News.NewsHidden, News.NewsTitle, News.MemberID, SUBSTRING(News.NewsContent, 1, 250) AS NewsContentSubString, News.NewsDate, Member.MemberID, Member.MemberName FROM News INNER JOIN Member ON News.MemberID = Member.MemberID WHERE News.NewsPinned = 1 AND News.NewsHidden = 0 ORDER by News.NewsID DESC LIMIT 3") or die(mysql_error());
                    while ($query = mysql_fetch_array($result)){                    
                ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <? echo $query['NewsTitle'] ?> &ensp;
                                <? include ("displayNewsTools.php") ?>
                            <small class="pull-right">
                                Posted on <? echo $query['NewsDate'] ?> by <? echo $query['MemberName'] ?>
                            </small>
                        </div>
                        <div class="panel-body">
                            <? echo $query['NewsContentSubString'] ?>
                        </div>
                        <div class="panel-footer">
                        <span class="label label-primary"><span class="glyphicon glyphicon-comment"></span> 0</span>
                            <a href="readNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                <small class='pull-right'>Read more &raquo;</small>
                            </a>
                        </div>
                    </div>
                <? } ?>