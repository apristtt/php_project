                <?
                $result = mysql_query("SELECT COUNT(*) FROM News WHERE NewsPinned = 0") or die(mysql_error());
                $totalrecord = mysql_result($result, 0,0);
                $p_size = 7;
                $totalpage = (int)($totalrecord/$p_size);
                if($totalrecord % $p_size!=0){
                    $totalpage++;
                }

                if(empty($_GET['page'])){
                    $page = 1;
                    $start = 0;
                } else {
                    $page = $_GET['page'];
                    $start = $p_size*($page-1);
                }
                    $result = mysql_query("SELECT NewsID, NewsPinned, NewsHidden, NewsTitle, SUBSTRING(NewsContent, 1, 250) AS NewsContentSubString, NewsDate FROM News WHERE NewsPinned = 0 AND NewsHidden = 0 ORDER by NewsID DESC LIMIT $start, $p_size") or die(mysql_error());
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
                        <span class="label label-primary"><span class="glyphicon glyphicon-comment"></span> 0</span>
                            <a href="readNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                <small class='pull-right'>Read more &raquo;</small>
                            </a>
                        </div>
                    </div>
                <? } ?>
            <?  for($i=1;$i<=$totalpage;$i++){ ?>
                    <ul class="pagination">
<!--                     <? //if($i < $i) { ?>
                        <li class="active">
                    <? // } else { ?>
                        <li>
                    <? //} ?> -->
                        <li><a href="home.php?page=<?echo $i ?>"><? echo $i ?></a></li>
                    </ul>
                <? } ?>