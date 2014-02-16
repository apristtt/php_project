           <!--                  <?
                                // include ("conf.php");
                                // $NewsID = $_REQUEST['NewsID'];
                                // $result = mysql_query("SELECT * FROM News WHERE NewsID = '$NewsID'") or die(mysql_error());
                                // while ($query = mysql_fetch_array($result)){
                            ?> -->
                            <span class="label label-warning">
                            <?  if ($query['NewsPinned']=='1') { ?>
                                <a href="doUnpinNews.php?NewsID=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-pushpin"></span>
                                </a> &middot;
                            <?  } else { ?>
                                <a href="doPinNews.php?NewsID=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-pushpin"></span>
                                </a> &middot;
                            <?  }   ?>   
                            
                            <?  if($query['NewsHidden']=='1') { ?>
                                <a href="doUnhidden.php?NewsID.php=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a> &middot;
                            <?  } else { ?>
                                <a href="doHidden.php?NewsID=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-eye-close"></span>
                                </a> &middot;
                            <?  }   ?>
                                <a href="editNews.php?NewsID=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a> &middot;
                                <a href="doDeleteNews.php?NewsID=<? echo $query['NewsID'] ?>" style="color:#FFFFFF;">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </span>
                           <!--  <?  // }   ?> -->