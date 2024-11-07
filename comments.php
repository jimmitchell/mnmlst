<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('WTF? Please do not load this page directly. Thanks!');
if (post_password_required()) {
    echo '<p>This post is password protected. Enter the password to view comments.</p>';
    return;
}
?>
<?php if (have_comments()) : ?>
    <h3 id="comments"><?php comments_number('No Comments Yet', '1 Comment So Far', '% Comments So Far'); ?></h3>
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&avatar_size=40'); ?>
    </ol>
    <?php if (!empty($comments_by_type['pings'])) : ?>
        <h3 id="trackbacks">Pings/Trackbacks</h3>
        <ol class="pinglist">
            <?php wp_list_comments('type=pings&short_ping=true'); ?>
        </ol>
    <?php endif; ?>
    <?php paginate_comments_links(array('prev_text' => '&larr; Older', 'next_text' => 'Newer &rarr;')); ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
    <?php
    $comments_args = array(
        'label_submit' => 'Submit',
        'comment_notes_after' => '',
    );
    comment_form($comments_args);
    ?>
<?php endif; ?>