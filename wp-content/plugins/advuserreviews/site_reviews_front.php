<?php foreach ($this->data['reviews'] as $key => $record){ ?>
    <div class="slide">
      <div class="otzuv">
          <div class="photo_ot">
              <a href="<?=$record['rev_link']?>" target="_blank"><img src="/wp-content/uploads/reviews/<?=($record['review_photo']=='0')?'not.png':$record['review_photo'] ?>"></a>
          </div>
          <div class="data_rev">
              <span class="name_otz"><?php echo $record['review_user_name'] ?></span>
              <span class="date_otz"><?php echo $record['review_date'] ?></span>
              <p class="text_rev">"<?php echo $record['review_text'] ?>"</p>
              <div class="clear"></div>
          </div>
          <div class="clear"></div>
      </div>
      </div>

<?php } ?>
