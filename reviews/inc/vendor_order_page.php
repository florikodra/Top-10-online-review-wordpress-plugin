
<div class="settings-page">
  











<?php


$args = array(
    'post_type' => 'vendors',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
if ($query->have_posts() ) : 

while ( $query->have_posts() ) : $query->the_post();
echo '<li  class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' . get_the_title() . '</li>';
echo '<li  class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' . get_the_title() . '</li>';
echo '<li  class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' . get_the_title() . '</li>';
endwhile;


wp_reset_postdata();
endif;

?>

</ul>


</div>

<div class="container">
<div class="row"><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-primary"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Primary_Card_Title">Primary Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-secondary"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Secondary_Card_Title">Secondary Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-success"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Success_Card_Title">Success Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-danger"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Danger_Card_Title">Danger Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-warning"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Warning_Card_Title">Warning Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-info"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Info_Card_Title">Info Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default bg-light"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Light_Card_Title">Light Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div><div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"><div class="card default text-white bg-dark"><div class="card-header default">Card Header</div><div class="card-body"><h4 class="card-title"><span id="Dark_Card_Title">Dark Card Title</span></h4><p class="card-text">The Card body with information. </p></div></div></div></div>
</div>







