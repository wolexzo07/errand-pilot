<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="testimonials1-7 workit" data-rv-view="34" style="background-color: whitesmoke;display:none;">
    <div>

        <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 60px; padding-bottom: 50px;">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="mbr-section__header"><font style="color:green;">GAMES</font> STATS.</h2>
                    <ul class="mbr-reviews mbr-reviews--wysiwyg row">
                        <li class="mbr-reviews__item col-xs-12 col-sm-12 col-md-12">
                            <div  style="overflow-x:auto; background-color:transparent;color:purple;" class="mbr-reviews__text">
                              <?php
                              if(x_count("iqplans","status='1'") > 0){
                                ?>
                                <table class="table table-striped table-bordered">
                                  <tr><th>No.</th><th>Plan</th><th>Total Players</th><th>Today Players</th><th>Total Winners</th><th>Today Winners</th></tr>
                                <?php
                                $counter = 0;
                                foreach(x_select("0","iqplans","status='1'","10","id") as $key){
                                  $counter++;
                                  $id = $key["id"];
                                  $type = $key["type"];
                                  $total_played = $key["total_played"];
                                  $today_played = $key["today_played"];
                                  $total_win = $key["total_win"];
                                  $today_win = $key["today_win"];
                                  ?>
                                  <tr>
                                    <td><?php echo $counter;?></td>
                                    <td><?php echo $type;?></td>
                                    <td><?php echo $total_played;?></td>
                                    <td><?php echo $today_played;?></td>
                                    <td><?php echo $total_win;?></td>
                                    <td><?php echo $today_win;?></td>
                                  </tr>
                                  <?php
                                }
                                ?></table><?php
                              }else{

                              }
                              ?>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
