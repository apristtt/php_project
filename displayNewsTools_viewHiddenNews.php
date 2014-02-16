                                <a href="doPinNews.php?NewsID=<? echo $query['NewsID'] ?>" alt="Pin this news">
                                    <span class="glyphicon glyphicon-pushpin"></span>
                                </a>
                                <a href="doUnhidden.php?NewsID=<? echo $query['NewsID'] ?>">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a href="editNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="doDeleteNews.php?NewsID=<? echo $query['NewsID'] ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>