<?php
/**
 * Article Page
 * this page contains all the output for the article/content page
 */

include '../_cms/index.php';

Cms::pageProtect();

$data = $cms->getCurrentData();

$countData = count($data);

?>
<form id="panel" class="js-content-form">

    <?php
    if ($countData != 0) { ?>
        <ul class="list">
            <?php
            foreach ($data as $jsonData) { ?>

            <li data-articleid="<?php echo $jsonData->content->meta->id; ?>">
                <span class="content-title">
                    <span class="content-title__inside">
                        <span class="js-content-title"><?php echo $jsonData->content->meta->title; ?></span>
                        <?php if (strlen($jsonData->content->meta->description) > 0) { ?>
                            <div class="description_icon js-show-desc"><span class="icon-question-sign"></span></div>
                            <div class="description_content js-desc-text">
                                <p><?php echo $jsonData->content->meta->description; ?></p>
                            </div>
                        <?php } ?>
                    </span>
                </span>
                <input type="hidden" placeholder="title" class="js-title" name="title[]" value="<?php echo $jsonData->content->meta->title; ?>">
                <input type="hidden" placeholder="id" class="js-id" name="id[]" value="<?php echo $jsonData->content->meta->id; ?>">
                <input type="text" class="content-input" placeholder="content" name="content[]" value='<?php echo html_entity_decode($jsonData->content->meta->content); ?>'>
                <input type="hidden" placeholder="description" class="js-description" name="description[]" value='<?php echo html_entity_decode($jsonData->content->meta->description); ?>'>
                <input type="hidden" name="time[]" value="<?php echo $jsonData->content->meta->time; ?>">
                <div class="edit js-edit"><span class="icon-pencil"></span></div>
            </li>

            <?php } ?>
        </ul>
        <input type="submit" class="save-progress" value="Save"/>
    <?php
    } else { ?>
        <ul class="list">
            <li class="no-content">No content yet! Create one by clicking the <span class="icon-plus js-create"></span>
                icon.
            </li>
        </ul>
    <?php } ?>
</form>