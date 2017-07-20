<div class="b-reviews-content-triangles">
    <?php  foreach ($this->data['reviews'] as $key => $record){ ?>
        <div class="b-reviews-content-triangles__item">
            <img width="150" height="150" src="/wp-content/uploads/reviews/<?=($record['review_photo']=='0')?'not.png':$record['review_photo'] ?>" class="attachment-thumbnail wp-post-image" alt="rjtKOO5LAQk">
            <b class="name_r"><?php echo $record['review_user_name'] ?></b>
            <div class="b-reviews-content-triangles__item-description">
                <p><?php echo $record['review_text'] ?></p>
            </div>
        </div>
    <?php  } ?>
</div>