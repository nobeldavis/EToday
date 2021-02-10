
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                        $sql = "SELECT * FROM posts";
                        $no_of_posts = mysqli_query($conn,$sql);
                        $post_count = mysqli_num_rows($no_of_posts);
                        ?>
                  <div class='huge'><?php echo $post_count;  ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="news.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                        $sql = "SELECT * FROM comments";
                        $no_of_comments = mysqli_query($conn,$sql);
                        $comment_count = mysqli_num_rows($no_of_comments);
                        ?>
                     <div class='huge'><?php echo $comment_count;  ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                        $sql = "SELECT * FROM news_sugg ";
                        $no_of_suggestions = mysqli_query($conn,$sql);
                        $suggestion_count = mysqli_num_rows($no_of_suggestions);
                        ?>
                        <div class='huge'><?php echo $suggestion_count; ?></div>
                         <div>News Requests</div>
                    </div>
                </div>
            </div>
            <a href="view_sugg.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->